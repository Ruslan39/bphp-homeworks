<?php
$chairs = 50;
$requiredRow = 3;
$requiredPlace = 5;

function generate($rows, $placesPerRow, $avaliableCount)
{
    if (($rows * $placesPerRow) > $avaliableCount) {
        return false;
    } else {
        for ($i = 1; $i < $rows + 1; $i++) {
            $arr2 = null;
            for ($j = 1; $j < $placesPerRow + 1; $j++) {
                $arr2[$j] = false;
                $arr[$i] = $arr2;
            }
        }
        return $arr;
    }
}

function reserve(&$map, $row, $place)
{
    if ($row > count($map) || $place > count($map[$row])) {
        return false;
    } else {
        if (($map[$row][$place]) === false) {
            $map[$row][$place] = true;
            return true;
        } else {
            return false;
        }
    }
}

$map = generate(5, 8, $chairs);

$reverve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reverve);

$reverve = reserve($map, $requiredRow, $requiredPlace);
logReserve($requiredRow, $requiredPlace, $reverve);

function logReserve($row, $place, $result)
{
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place<br>".PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась<br>".PHP_EOL;
    }
}