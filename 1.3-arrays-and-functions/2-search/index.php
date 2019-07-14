<?php
$chairs = 50;
$requiredSeats = 3;

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

function reserveForCompany(&$map, $requiredSeats)
{
    $rowLength = count($map['1']);
    if ($requiredSeats > $rowLength) {
        return false;
    } else {
        for ($i = 1; $i <= count($map); $i++) {
            $seatsFinded = 0;
            for ($j = 1; $j <= $rowLength; $j++) {
                if ($rowLength - $j + 1 + $seatsFinded >= $requiredSeats) {
                    if ($map[$i][$j] === false) {
                        $seatsFinded++;
                            if ($seatsFinded == $requiredSeats) {
                                return [$i, $j];
                            }
                    } else {
                        $seatsFinded = 0;
                        continue;
                    }
                } else {
                    break;
                }
            }
        }
        return false;
    }
}

$map = generate(5, 8, $chairs);

$reverve = reserveForCompany($map, $requiredSeats);
logReserve($requiredSeats, $reverve);

function logReserve($seats, $result)
{
    if ($result) {
        $seatsFrom = $result[1] - $seats + 1;
        $seatsTo = $result[1];
        echo "Ваши места забронированы! Ряд $result[0], места с $seatsFrom по $seatsTo<br>".PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась<br>".PHP_EOL;
    }
}