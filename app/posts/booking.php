<?php

declare(strict_types=1);

require "../hotelFunctions.php";

header('Content-Type: application/json');

function importData() {
if (isset($_POST["transferCode"], $_POST["arrival"], $_POST["departure"], $_POST["room"])) {

    $db = connect("db/bookings.db");

    $transferCode = trim($_POST["transferCode"]);
    $arrival = trim($_POST["arrival"]);
    $departure = trim($_POST["departure"]);
    $roomId = trim($_POST["room"]);

    $statementBookings = $db->prepare("INSERT INTO bookings (arrival_date, departure_date, transfer_code) VALUES (:arrival_date, :departure_date, :transfer_code)");

    $statementRoomId = $db->prepare("INSERT INTO booking_rooms (room_id) VALUES (:room_id)");

    $statementBookings->bindParam(':arrival_date', $arrival);
    $statementBookings->bindParam(':departure_date', $departure);
    $statementBookings->bindParam(':transfer_code', $transferCode);
    $statementRoomId->bindParam(':room_id', $roomId);

    $statementBookings->execute();
    $statementRoomId->execute();
};
};

importData();

$receiptFile = "../../receipt.json";

$receipt = file_get_contents($receiptFile);
echo $receipt;