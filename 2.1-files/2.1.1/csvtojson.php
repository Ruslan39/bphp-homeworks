<?php

$handle = fopen('data.csv', 'r');
$data = fgetcsv($handle);
$keys = explode(';', $data[0]);
$num_keys = count($keys);
$new_data = [];
while ($data = fgetcsv($handle)) {  //не видит русских букв из-за разных локалей
    print_r($data);
    $one_str_arr = explode(';', $data[0]);
    $one_str_obj = [];
    for ($i = 0; $i < $num_keys; $i++) {
        $one_str_obj[$keys[$i]] = $one_str_arr[$i];
    }
    $new_data[] = $one_str_obj;
}

fclose($handle);

$json_data = json_encode($new_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
$file = 'data.json';
file_put_contents($file, $json_data);
echo 'Encoding finished!';