<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . "/app/hotelFunctions.php";

use benhall14\phpCalendar\Calendar as Calendar;

$budgetCalendar = new Calendar;
$standardCalendar = new Calendar;
$luxuryCalendar = new Calendar;

$budgetCalendar->stylesheet();
$standardCalendar->stylesheet();
$luxuryCalendar->stylesheet();

$events = array();

// Updates the calender on index.php based on room id.
function updateCalendar($calendar, $id) {

    $db = connect("db/bookings.db");

    $statement = $db->query("SELECT arrival_date, departure_date FROM bookings WHERE room_id = $id");
    $bookedDates = $statement->fetchAll();

    foreach ($bookedDates as $bookedDate){
    $arrivalDate = $bookedDate["arrival_date"];
    $departureDate = $bookedDate["departure_date"];
    $calendar->addEvent($arrivalDate, $departureDate, '', true);
    }
};

updateCalendar($budgetCalendar, 1);
updateCalendar($standardCalendar, 2);
updateCalendar($luxuryCalendar, 3);
?>