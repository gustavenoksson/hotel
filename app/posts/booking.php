<?php

declare(strict_types=1);

require "../hotelFunctions.php";
header('Content-Type: application/json');

// Function to check if date is avaible for booking.
function isValidDate() {

    $db = connect("db/bookings.db");

    $arrival = trim($_POST["arrival"]);

    $statement = $db->query("SELECT arrival_date, departure_date FROM bookings");
    $dates = $statement->fetchAll();

    foreach($dates as $date){
        $arrivalDate = $date["arrival_date"];
        $departureDate = $date["departure_date"];

        if ($arrival >= $arrivalDate && $arrival < $departureDate) {
            echo $arrival . " is between " . $arrivalDate . " & ". $departureDate;
            die();
        }
    };
    importData();
};

// Function to import users inputs into database.
function importData() {
    if (isset($_POST["arrival"], $_POST["departure"], $_POST["room"])) {

    $db = connect("db/bookings.db");

    htmlspecialchars($_POST["arrival"]);
    htmlspecialchars($_POST["departure"]);
    htmlspecialchars($_POST["room"]);

    $arrival = trim($_POST["arrival"]);
    $departure = trim($_POST["departure"]);
    $roomId = trim($_POST["room"]);

    $statementBookings = $db->prepare("INSERT INTO bookings (arrival_date, departure_date, room_id) VALUES (:arrival_date, :departure_date, :room_id)");

    $statementBookings->bindParam(':arrival_date', $arrival);
    $statementBookings->bindParam(':departure_date', $departure);
    $statementBookings->bindParam(':room_id', $roomId);

    $statementBookings->execute();

    header("Location: ../../receipt.php");
}
};

isValidDate();