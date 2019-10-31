<?php

require 'autoload.php';
require 'config/SystemConfig.php';

$file0001 = new FileAccessModel('test1');
$file0001_content = $file0001->read();
print_r($file0001_content);

echo '<br><br>';

$file0002 = new JsonFileAccessModel('test2');
$file0002_contentFromJson = $file0002->readJson();
print_r($file0002_contentFromJson);

echo '<br><br>';

$newJsonContent = [
    'Name' => 'Ivan',
    'Surname' => 'Petrov',
    'Age' => '99'
];

$file0002->writeJson($newJsonContent);

$file0002_contentFromJson = $file0002->readJson();
print_r($file0002_contentFromJson);