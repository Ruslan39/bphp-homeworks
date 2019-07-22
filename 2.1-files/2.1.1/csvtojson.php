<?php

$handle = fopen('data.csv', 'r');
$csvFile = [];
$dates = [];
$csvToArray = [];
$csvFile = array_map('str_getcsv', file('data.csv'));
// print_r($csvFile);

for ($i = 0; $i < count($csvFile); $i++) {
    $csvToArray[$i] = str_getcsv($csvFile[$i][0], ';');     //Заголовки таблицы
}
// print_r($csvToArray);

for ($i = 1; $i < count($csvToArray); $i++) {
    for ($j = 0; $j < count($csvToArray[1]); $j++) {
        $dates[$i][$csvToArray[0][$j]] = $csvToArray[$i][$j];       //Тело таблицы
    }    
}
// print_r($dates);

$json = json_encode($dates, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
file_put_contents('data.json', $json);
fclose($handle);