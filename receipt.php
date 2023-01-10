<?php

header('Content-Type: application/json');



$vacation = [
  "island" => "The Yellow Duck Island",
  "hotel" => "The Yellow Duck",
  "arrival_date" => "202020",
  "departure_date" => "20202",
  "total_cost" => "8",
  "stars" => "2",
  "features" => [ "name" => "Fruit basket for vitamin C", "cost" => 1 ],
  "addtional_info" => "Thank you for staying at the Yellow Duck!"
];

print_r($vacation);

// {
//   "vacation": [
//     {
//       "island": "The Yellow Duck Island",
//       "hotel": "The Yellow Duck",
//       "arrival_date": "2023-01-01",
//       "departure_date": "2023-01-04",
//       "total_cost": "8",
//       "stars": "2",
//       "features": [{ "name": "Fruit basket for vitamin C", "cost": 1 }],
//       "addtional_info": "Thank you for staying at the Yellow Duck!"
//     }
//   ]
// }
