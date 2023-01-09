<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use benhall14\phpCalendar\Calendar as Calendar;

$budgetCalendar = new Calendar;
$standardCalendar = new Calendar;
$luxuryCalendar = new Calendar;

$budgetCalendar->stylesheet();
$standardCalendar->stylesheet();
$luxuryCalendar->stylesheet();

$events = array();

$events[] = array(
    'start' => '2023-01-11',
    'end' => '2023-01-16',
    'mask' => true,
    'classes' => ['myclass', 'abc']
);

$events[] = array(
    'start' => '2022-12-25',
    'end' => '2022-12-25',
    'summary' => 'Christmas',
    'mask' => true
);

$budgetCalendar->addEvents($events);
?>