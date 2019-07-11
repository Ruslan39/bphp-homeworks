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

    $registrationPassed = 0;

    if (preg_match('/[@\/*?,;:]/', $login) === 1) {
        echo 'Логин не должен содержать следующие символы: @/*?,;:<br>';
    } else {
        ++$registrationPassed;
    }

    if ($passwordLength < 8 ) {
        echo 'Пароль должен быть длиной минимум 8 символов<br>';
    } else {
        ++$registrationPassed;
    }

    if (preg_match('/[^s]+@[^s\.]+\.[^s]+$/', $email) === 0) {
        echo 'Почта должна быть формата почта@домен.доменнаязона<br>';
    } else {
        ++$registrationPassed;
    }

    if (strlen($firstName) == 0 || strlen($lastName) == 0 || strlen($middleName) == 0) {
        echo 'Поля Фамилия, Имя, Отчество не могут быть пустыми<br>';
    } else {
        ++$registrationPassed;
    }
    
    if (strlen($code) ===0 || strcmp($codeWord, $codeTrimmedtoLower) === 1) {
        echo 'Кодовые слова не совпадают<br>';
    } else {
        ++$registrationPassed;
    }

    // Количество условий успешной регистрации = 5
    if ($registrationPassed === 5) {
        echo 'Регистрация успешно завершена<br>';
    }
?>