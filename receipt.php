<?php

declare(strict_types=1);
session_start();

header('Content-Type: application/json');

$vacation = [
  "island" => "The Yellow Duck Island",
  "hotel" => "The Yellow Duck",
  "arrival_date" => $_SESSION["arrival"],
  "departure_date" => $_SESSION["departure"],
  "total_cost" => $_SESSION["totalAmount"],
  "stars" => "1",
  "additional_info" => "Thank you for staying at the Yellow Duck!"
];

$receipt = json_encode($vacation);

echo $receipt;
