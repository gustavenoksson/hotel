<?php

declare(strict_types=1);
session_start();

require __DIR__ . "../../hotelFunctions.php";
require "../../vendor/autoload.php";

header('Content-Type: application/json');

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

// Function to check if date is avaible for booking.
function isValidDate() {

    $db = connect("db/bookings.db");

    $arrival = trim(htmlspecialchars($_POST["arrival"]));
    $departure = trim(htmlspecialchars($_POST["departure"]));
    $roomId = trim(htmlspecialchars($_POST["room"]));
    $transferCode = trim(htmlspecialchars($_POST["transferCode"]));
    $totalAmount = trim(htmlspecialchars($_POST["totalAmount"]));

    $_SESSION["arrival"] = $arrival;
    $_SESSION["departure"] = $departure;
    $_SESSION["totalAmount"] = $totalAmount;

    $statement = $db->prepare("SELECT arrival_date, departure_date, room_id FROM bookings WHERE room_id IS :room_id");

    $statement->bindParam(":room_id", $roomId);
    $statement->execute();
    $bookings = $statement->fetchAll();

    foreach($bookings as $booking){
        $dbArrivalDate = $booking["arrival_date"];
        $dbDepartureDate = $booking["departure_date"];

        if ($arrival >= $dbArrivalDate && $arrival < $dbDepartureDate) {
            echo "Sorry " . $arrival . " is between " . $dbArrivalDate . " & ". $dbDepartureDate;
            die();
        };
        if ($arrival > $departure){
            echo "Departure date need to be after arrival.";
            die();
        }
    };
    // When date is checked by function, check the transfercode. If ok run functions to import data and deposit funds. Take user to receipt.php.
        if (checkTransferCode($transferCode, $totalAmount)) {
        importData();
        depositFunds($transferCode);
        header("Location: ../../receipt.php");
        }
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
}
};

// Function to check if transfercode valid
function checkTransferCode($transferCode, $totalAmount){

    if(!isValidUuid($transferCode)) {
        echo "Sorry this transfercode is not valid.";
        return false;
    }
    
        $client = new GuzzleHttp\Client();
        $options = [
            'form_params' => [
                "transferCode" => $transferCode, "totalCost" => $totalAmount
            ]
        ];

    try {
        $response = $client->POST('https://www.yrgopelago.se/centralbank/transferCode', $options);
        $response = $response->getBody()->getContents();
        $response = json_decode($response, true);
    } catch (\Exception $e) {
        echo "Could not connect to desired API" . $e;
    }
    // Check $response for "amount" key and if the total cost of the booking is higher than what the key has.
    if (!isset($response["amount"]) || $totalAmount > $response["amount"]) {
        echo "Sorry you do not have sufficent funds";
        return false;
    }

    return true;
}

// Function to deposit funds into my bank via transfercode.
function depositFunds ($transferCode) {

    $client = new \GuzzleHttp\Client();
    $options = [
        'form_params' => [
            'user' => 'Gustav',
            'transferCode' => $transferCode
        ]
    ];
    try {
        $response = $client->POST('https://www.yrgopelago.se/centralbank/deposit', $options);
        $response = $response->getBody()->getContents();
        $response = json_decode($response, true);
    } catch (\Exception $e) {
        echo "Something went wrong, money not deposited." . $e;
    };
};
    
isValidDate();