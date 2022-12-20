<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use benhall14\phpCalendar\Calendar as Calendar;

$calendar = new Calendar;
$calendar->stylesheet();

echo $calendar->draw(date('2023-01-01'));
?>