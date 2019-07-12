<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];


//$fullname = ucfirst($lastName).' '.ucfirst($firstName).' '.ucfirst($middleName);  // странно, но ведь этот способ тоже работает
//echo "$fullname<br>";

$fullname = mb_convert_case($lastName, MB_CASE_TITLE).' '.mb_convert_case($firstName, MB_CASE_TITLE).' '.mb_convert_case($middleName, MB_CASE_TITLE);
$fio = mb_substr($lastName, 0, 1).mb_substr($firstName, 0, 1).mb_substr($middleName, 0, 1);
$surnameAndInitials = ucfirst($lastName).' '.mb_substr($firstName, 0, 1).'.'.mb_substr($middleName, 0, 1).'.';

echo "$fullname<br>$fio<br>$surnameAndInitials";