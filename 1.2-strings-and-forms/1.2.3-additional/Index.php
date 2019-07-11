<?php
// Задание №1
$input = 'https://example.com';
$stringToSearch = 'https';

$output1 = substr($input, 0, 5);
if ($output1 === $stringToSearch) {
    echo 'Да';
} else {
    echo 'Нет';
}

echo '<br>';

$output2 = strpos($input, $stringToSearch);
if ($output2 === 0) {
    echo 'Да';
} else {
    echo 'Нет';
}

echo '<hr>';

// Задание №2
$inputDate = '05-29-1993';

$inputMonth = substr($inputDate, 0, 2);
$inputDay = substr($inputDate, 3, 2);
$inputYear = substr($inputDate, 6, 4);

$outputDate = "$inputDay.$inputMonth.$inputYear";

echo "Американский формат: $inputDate<br>";
echo "Русский формат: $outputDate";

echo '<hr>';

// Задание №3
$inputPrice = 10536;
$currency = ' руб.';

$outputPrice = number_format($inputPrice, 0, ' ', ' ').$currency;

echo $outputPrice;