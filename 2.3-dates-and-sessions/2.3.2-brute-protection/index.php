<?php
session_start();

$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];

if( !empty($_POST) )
{
    if( !isset($_SESSION['loginAttempts']) )
    {
        $_SESSION['loginAttempts'] = 0;
    }

    $loginTime = time();

    if( !$_SESSION['banTime'] )
    {
        $_SESSION['banTime'] = $loginTime;
    }

    if( $_SESSION['banTime'] <= $loginTime )
    {
        setcookie( "$_REQUEST[login]", "$loginTime", time() + 60 );  //запоминаю на 1 минуту время последней попытки логирования для каждого пользователя
        
        if( isset($users[$_REQUEST['login']]) AND ( $users[$_REQUEST['login']] == $_REQUEST['password'] ) )
        {
            echo '<br>Авторизация пройдена!';
            $_SESSION['loginAttempts'] = 0;

        } else if( isset($users[$_REQUEST['login']]) ) {
            $timeFromLastLogin = $loginTime - $_COOKIE[$_REQUEST['login']];

            if( $timeFromLastLogin < 5 ) 
            {
                $_SESSION['banTime'] = $loginTime + 60;
                echo '<br>Слишком часто вводите пароль. Попробуйте еще раз через минуту.';

            } else {
                echo '<br>Введен неверный пароль. Пожалуйста, попробуйте еще раз.';
            }

            $_SESSION['loginAttempts']++;

            if( $_SESSION['loginAttempts'] > 2 )
            {
                $_SESSION['banTime'] = $loginTime + 60;
                $_SESSION['loginAttempts'] = 0;
                echo '<br>Вы заблокированы на 1 минуту. Пожалуйста, повторите попытку позже.';
            }
            
            $fileName = 'logs/' . $_REQUEST['login'] . '.txt';
            $handle = fopen("$fileName", 'a');
            $addToLog = date('d.m.Y H:i:s', $loginTime);
            fwrite($handle, "\r\n$addToLog");
            fclose($handle);

        } else if( !isset($users[$_REQUEST['login']]) ) {
            echo '<br>Пользователь ' . $_REQUEST['login'] . ' не зарегистрирован в системе. Зарегистрируйтесь или повторите попытку.';

        } else {
            echo '<br>Сбой авторизации. Пожалуйста, повторите попытку.';   
        }
        
    } else {
        $banTimeLeft = $_SESSION['banTime'] - $loginTime;

        echo '<br>Обнаружена подозрительная активность. Пожалуйста, дождитесь завершения блокировки: ' . "$banTimeLeft" . ' сек.';
    }    
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Авторизация</title>
  <style type="text/css">
    input {
		display: block;
		margin-top: 10px;
	}
	button {
		margin-top: 10px;
	}
  </style>
</head>
<body>
<form action="" method="post">
  <input type="text" name="login" placeholder="Логин" required>
  <input type="password" name="password" placeholder="Пароль" required>
  <button type="submit">Отправить</button>
</form>
</body>
</html>