<?php

declare(strict_types=1);

require "../hotelFunctions.php";
header('Content-Type: application/json');

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
            echo $arrival . " is between " . $dbarrivalDate . " & ". $dbdepartureDate;
            die();
        };
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

isValidDate();