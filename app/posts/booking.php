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
            echo $arrival . " is between " . $arrivalDate . $departureDate;
            die();
        }
    };
    importData();
};

function importData() {
    if (isset($_POST["arrival"], $_POST["departure"], $_POST["room"])) {
    $db = connect("db/bookings.db");

    $arrival = ($_POST["arrival"]);
    $departure = trim($_POST["departure"]);
    $roomId = trim($_POST["room"]);

    $statementBookings = $db->prepare("INSERT INTO bookings (arrival_date, departure_date) VALUES (:arrival_date, :departure_date)");
    $statementRoomId = $db->prepare("INSERT INTO booking_rooms (room_id) VALUES (:room_id)");

    $statementBookings->bindParam(':arrival_date', $arrival);
    $statementBookings->bindParam(':departure_date', $departure);
    $statementRoomId->bindParam(':room_id', $roomId);

    $statementBookings->execute();
    $statementRoomId->execute();

    $receiptFile = "../../receipt.json";
    $receipt = file_get_contents($receiptFile);
    echo $receipt;
}
};

isValidDate();