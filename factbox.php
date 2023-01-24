<?php

declare(strict_types=1);

//This page should also include a "fact box" which presents:

// -total revenue for the hotel (total cost for all the bookings)

function getRevenue():array
{
    $db = connect('/db/bookings.db');

    $statement = $db->prepare(
        'SELECT
        bookings.arrival_date,
        bookings.departure_date,
        bookings.room_id,
        rooms.room_cost
        FROM bookings
        INNER JOIN rooms
        ON rooms.id = bookings.room_id'
    );

    $statement->execute();

    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $bookings;
}




