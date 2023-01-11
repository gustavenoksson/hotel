<?php

declare(strict_types=1);

require __DIR__ . "../../hotelFunctions.php";
require "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

// Function to check if date is avaible for booking.
function isValidDate() {

    $db = connect("db/bookings.db");

    $arrival = trim(htmlspecialchars($_POST["arrival"]));
    $roomId = trim(htmlspecialchars($_POST["room"]));

    $statement = $db->prepare("SELECT arrival_date, departure_date, room_id FROM bookings WHERE room_id IS :room_id");

    $statement->bindParam(":room_id", $roomId);
    $statement->execute();
    $bookings = $statement->fetchAll();

    foreach($bookings as $booking){
        $dbarrivalDate = $booking["arrival_date"];
        $dbdepartureDate = $booking["departure_date"];
        $dbroomId = $booking["room_id"];

        if ($arrival >= $dbarrivalDate && $arrival < $dbdepartureDate) {
            echo "Sorry " . $arrival . " is between " . $dbarrivalDate . " & ". $dbdepartureDate;
            die();
        };
        if ($dbdepartureDate > $dbarrivalDate){
            echo "Departure date need to be after arrival";
            die();
        }
    };
    importData();
};

// Function to import users inputs into database.
function importData() {
    if (isset($_POST["arrival"], $_POST["departure"], $_POST["room"])) {

    $db = connect("db/bookings.db");

    $arrival = trim(htmlspecialchars($_POST["arrival"]));
    $departure = trim(htmlspecialchars($_POST["departure"]));
    $roomId = trim(htmlspecialchars($_POST["room"]));

    $statementBookings = $db->prepare("INSERT INTO bookings (arrival_date, departure_date, room_id) VALUES (:arrival_date, :departure_date, :room_id)");

    $statementBookings->bindParam(':arrival_date', $arrival);
    $statementBookings->bindParam(':departure_date', $departure);
    $statementBookings->bindParam(':room_id', $roomId);

    $statementBookings->execute();

    header("Location: ../../receipt.php");
}
};

function updateCalendar($calendar, $id) {

    $db = connect("db/bookings.db");

    $statement = $db->query("SELECT arrival_date, departure_date FROM bookings WHERE room_id = $id");
    $bookedBudgetDates = $statement->fetchAll();

    foreach ($bookedBudgetDates as $bookedBudgetDate){
    $arrivalDate = $bookedBudgetDate["arrival_date"];
    $departureDate = $bookedBudgetDate["departure_date"];
    $calendar->addEvent($arrivalDate, $departureDate, '', true);
    }
};

function checkTransferCode(){

    $transferCode = trim(htmlspecialchars($_POST["transfercode"]));
    $totalAmount = trim(htmlspecialchars($_POST["totalAmount"]));

    if(!isValidUuid($transferCode)) {
        echo "Sorry this transfercode is not valid.";
        return false;
    } else {
        $client = new GuzzleHttp\Client();
        $options = [
            'form_params' => [
                "transfercode" => $transferCode, "totalcost" => $totalAmount
            ]
        ];
    }

    try {
        $response = $client->POST('https://www.yrgopelago.se/centralbank/transferCode', $options);
        $response = $response->getBody()->getContents();
        $response = json_decode($response, true);
    } catch (\Exception $e) {
        return "Could not connect to desired API" . $e;
    }
}

isValidDate();