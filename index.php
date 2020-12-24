<?php
declare(strict_types = 1);
error_reporting (E_ALL);


  $isSend = false;
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = trim($_POST['name']);
   $phone = trim($_POST['phone']) ;

    if ($name === '' || $phone === '') {
      $err = 'Заполните все поля!';
    }
    else if(mb_strlen($name, 'UTF-8') < 2) {
      $err = 'Имя должно быть не короче 2-х символов';
    }
    else {
      $isSend = true;
      $app = "$name|$phone\n";
      file_put_contents('users.txt', $app, FILE_APPEND);
    }
  }
  else {
    $err = '';

    $name ='';
    $phone = '';
  }
?>
<a href="admin.php">Посмотреть заявки</a>
<div class="form">
<? if ($isSend): ?>
  <p>Ваша заявка принята, ожидайте ответа!</p>
<? else: ?>  
</div>
<form action="" method="post">
  Введите имя:<br>
  <input type="text" name="name" value="<?=$name?>"><br>
  Введите номер:<br>
  <input type="text" name="phone" value="<?=$phone?>">
  <button type="submit">Отправить</button>
  <p><?=$err?></p>
</form>
<?endif?>