<?php
    error_reporting(E_ALL);
    $variable = 3.14;

    if (is_bool($variable)) {
        $type = 'bool';
        $printedVariable = ($variable === true) ? 'true' : 'false'; 
        $description = "Логический тип данных.<br>Принимает значение 'ложь' или 'истина'.";
    } elseif (is_float($variable)) {
        $type = 'float';
        $printedVariable = $variable;
        $description = 'Число с плавающей точкой.<br>Используется для вещественных чисел.';
    } elseif (is_int($variable)) {
        $type = 'int';
        $printedVariable = $variable;
        $description = 'Целые числа.<br>Это число из множества Z = {..., -2, -1, 0, 1, 2, ...}, обычно длиной 32 бита (от –2 147 483 648 до 2 147 483 647).';
    } elseif (is_string($variable)) {
        $type = 'string';
        $printedVariable = $variable;
        $description = 'Строки.<br>Строка в PHP - это набор символов любой длины.';
    } elseif (is_null($variable)) {
        $type = 'null';
        $printedVariable = 'Null';
        $description = 'Специальный тип Null (пустой тип).<br>Специальное значение NULL говорит о том, что эта переменная не имеет значения.';
    } else {
        $type = 'other';
        $printedVariable = $variable;
        $description = 'Здесь могут быть Массивы, Объекты или Ресурсы.<br><br>
        Массивы - это упорядоченные наборы данных, представляющие собой список однотипных элементов.<br>
        Объект представляет собой переменную, экземпляр которой создается по специальному шаблону, называемому классом.<br>
        Ресурс - это специальная переменная, содержащая ссылку на внешний ресурс.';
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p>
        <?= 
            "$printedVariable is $type
            <br><hr><br>
            $description";
        ?>
    </p>
</body>
</html>