<?php

declare(strict_types=1);

require "hotelFunctions.php";
$db = connect("bookings.db");

if (isset($_POST["transferCode"], $_POST["arrival"], $_POST["departure"], $_POST["room"])) {

    $tranferCode = trim($_POST["transferCode"]);
    htmlspecialchars($tranferCode);
    $arrival = trim($_POST["arrival"]);
    $departure = trim($_POST["departure"]);
    $roomId = trim($_POST["room"]);

    $statementBookings = $db->query("INSERT INTO bookings (arrival_date, departure_date, transfer_code) VALUES (:arrival_date, :departure_date, :transfer_code)");
    $statementRoomId = $db->query("INSERT INTO booking_rooms (room_id) VALUES (:roomId)");

    $statementBookings->bindParam(':arrival_date', $arrival);
    $statementBookings->bindParam(':departure_date', $departure);
    $statementBookings->bindParam(':transfer_code', $tranferCode);
    $statementRoomId->bindParam(':roomId', $roomId);

    $statementBookings->execute();
    $statementRoomId->execute();
};