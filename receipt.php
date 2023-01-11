<?php

header('Content-Type: application/json');

$vacation = [
  "island" => "The Yellow Duck Island",
  "hotel" => "The Yellow Duck",
  "arrival_date" => $arrivalDate,
  "departure_date" => $departureDate,
  "total_cost" => $totalAmount,
  "stars" => "1",
  "addtional_info" => "Thank you for staying at the Yellow Duck!"
];

$receipt = json_encode($vacation);

echo $receipt;