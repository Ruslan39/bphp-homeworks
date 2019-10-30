<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2.2.2</title>
</head>
<body>
    <form action="./formActions/addUser.php" method='post'>
        <p>Имя: <input type='text' name="name"></p>
        <p>Пароль: <input type='password' name="password"></p>
        <p>Электронная почта: <input type='email' name="email"></p>
        <p>Рейтинг: <input type='text' name="rate"></p>
        <input type='submit' value="Добавить пользователя">
    </form>
    <hr><br>
</body>
</html>

<?php

require 'autoload.php';
require 'config/SystemConfig.php';

$users = new Users(users);
$users->displaySortedList();
?>