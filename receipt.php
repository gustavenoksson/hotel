<?php

header('Content-Type: application/json');

function printReciept() {

$vacation = [
  "island" => "The Yellow Duck Island",
  "hotel" => "The Yellow Duck",
  "arrival_date" => "202020",
  "departure_date" => "20202",
  "total_cost" => "8",
  "stars" => "1",
  "addtional_info" => "Thank you for staying at the Yellow Duck!"
];

$receipt = json_encode($vacation);

echo $receipt;
};