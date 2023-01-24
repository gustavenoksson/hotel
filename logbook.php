<?php

declare(strict_types=1);

//Create a logbook page which displays values from logbook.json and presents them in a style and fashion that goes in line with the rest of the page/site.

//It could be useful to implement the 'card' design pattern, or something similar to present a lot of similar items.

/*                  {
                    "island": "Island name",
                    "hotel": "Hotel name",
                    "room": "room type",
                    "arrival_date": "2023-01-01",
                    "departure_date": "2023-01-06",
                    "total_cost": integer,
                    "stars": integer,
                    "features": [
                           array
                    ],
                    "additional_info": "string"
                  }
*/
function createCards()
{
    $bookings = file_get_contents(__DIR__ . '/logbook.json');
    $bookings = json_decode($bookings, true);

    foreach ($bookings as $booking) { ?>

        <div class="card">
            <?php
            $island = $booking['island'];
            $hotel = $booking['hotel'];
            $arrivalDate = $booking['arrival_date'];
            $departureDate = $booking['departure_date'];
            $features = $booking['features'];
            $stars = $booking['stars'];
            $additional_info = $booking['additional_info'];
            $totalCost = $booking['total_cost'];


            echo "<h3> Visit to " . $hotel . " at " . $island . "</h3>" . "<br>" .
                "Arrival Date: " . $arrivalDate . "<br>" .
                "Departure Date: " . $departureDate . "<br>" .
                "Stars: " . $stars . "<br>" .
                "Additional Info: " . $additional_info . "<br>" .
                "Total Cost: " . $totalCost . "<br>";

            foreach ($features as $feature) {
                echo "Feature Name: " . $feature['name'] . "<br>";
                echo "Feature Cost: " . $feature['cost'] . "<br>";
            } ?>
        </div>
<?php
    }
}
?>

