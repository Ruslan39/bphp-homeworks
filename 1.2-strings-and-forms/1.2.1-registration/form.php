<?php 
    $codeWord = 'nd82jaake';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $middleName = $_POST['middleName'];
    $code = $_POST['code'];

    $passwordLength = strlen($password);
    $codeTrimmedtoLower = strtolower(trim($code, " "));

    $registrationError = 0;

    if (preg_match('/[@\/*?,;:]/', $login) === 1) {
        echo 'Логин не должен содержать следующие символы: @/*?,;:<br>';
        ++$registrationError;
    }

    if ($passwordLength < 8 ) {
        echo 'Пароль должен быть длиной минимум 8 символов<br>';
        ++$registrationError;
    }

    if (preg_match('/[^s]+@[^s\.]+\.[^s]+$/', $email) === 0) {
        echo 'Почта должна быть формата почта@домен.доменнаязона<br>';
        ++$registrationError;
    }

    if (strlen($firstName) == 0 || strlen($lastName) == 0 || strlen($middleName) == 0) {
        echo 'Поля Фамилия, Имя, Отчество не могут быть пустыми<br>';
        ++$registrationError;
    }
    
    if (strlen($code) ===0 || strcmp($codeWord, $codeTrimmedtoLower) === 1) {
        echo 'Кодовые слова не совпадают<br>';
        ++$registrationError;
    }

    if ($registrationError === 0) {
        echo 'Регистрация успешно завершена<br>';
    }
?>