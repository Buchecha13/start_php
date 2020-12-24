<?php
    $apps = file('users.txt');
    $count = count($apps);
    echo "<p>Количество заявок: $count</p>";
?>
<table border="1">
    <tr>
        <td><b>Имя</b> </td>
        <td><b>Телефон</b></td>
    </tr>
    <? foreach ($apps as $app): ?>
    <?php $appArr = explode('|', $app)?>
    <tr>
        <? foreach ($appArr as $one): ?>
        <td>
            <?=$one?>
        </td>
        <? endforeach; ?>
    </tr>
    <? endforeach; ?>
</table>