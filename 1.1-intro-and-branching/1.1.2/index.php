<?php
    $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
    $greetings = [
        'morning' => 'Доброе утро!',
        'day' => 'Добрый день!',
        'evening' => 'Добрый вечер!',
        'night' => 'Доброй ночи!'
    ];
    $currentHour = date("H");
    $currentMin = date("i");
    $currentDay = date("N") - 1;

    if (($currentHour >= 6 && $currentHour <= 9) || ($currentHour == 10 && $currentMin <= 59)) {
        $currentHourGreeting = $greetings['morning'];
        $image = 'morning';
    } elseif (($currentHour >= 11 && $currentHour <= 16) || ($currentHour == 17 && $currentMin <= 59)) {
        $currentHourGreeting = $greetings['day'];
        $image = 'day';
    } elseif (($currentHour >= 18 && $currentHour <= 21) || ($currentHour == 22 && $currentMin <= 59)) {
        $currentHourGreeting = $greetings['evening'];
        $image = 'evening';
    } elseif (($currentHour >= 0 && $currentHour <= 4) || ($currentHour == 5 && $currentMin <= 59) || ($currentHour == 23 && $currentMin <= 59)) {
        $currentHourGreeting = $greetings['night'];
        $image = 'night';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="img <?= $image; ?>">
        <div class="greeting">
            <h1><?= "$currentHourGreeting <br> Сегодня - $days[$currentDay]"; ?></h1>
        </div>
    </div>
</body>
</html>