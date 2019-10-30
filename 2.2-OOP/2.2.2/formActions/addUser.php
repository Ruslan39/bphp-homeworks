<?php 

require '../autoload.php';
require '../config/SystemConfig.php';

$newUser = new User();
$newUser->addUserFromForm($_REQUEST);

header('HTTP/1.1 200 OK');
header('Location: http://' . $_SERVER['HTTP_HOST'] . '/2.2-OOP/2.2.2');