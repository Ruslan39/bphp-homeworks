<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];


$fullname = mb_convert_case($lastName, MB_CASE_TITLE).' '.mb_convert_case($firstName, MB_CASE_TITLE).' '.mb_convert_case($middleName, MB_CASE_TITLE);
$fio = mb_convert_case(mb_substr($lastName, 0, 1), MB_CASE_TITLE).mb_convert_case(mb_substr($firstName, 0, 1), MB_CASE_TITLE).mb_convert_case(mb_substr($middleName, 0, 1), MB_CASE_TITLE);
$surnameAndInitials = mb_convert_case($lastName, MB_CASE_TITLE).' '.mb_convert_case(mb_substr($firstName, 0, 1), MB_CASE_TITLE).'.'.mb_convert_case(mb_substr($middleName, 0, 1), MB_CASE_TITLE).'.';

echo "$fullname<br>$fio<br>$surnameAndInitials";