<?php

declare(strict_types=1);

require "vendor/autoload.php";
require "../hotelFunctions.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

function checkTransferCode(){
    
    htmlspecialchars($_POST["transfercode"]);
    $transferCode = $_POST["transfercode"];

    $client = new Client([
        'base_uri' => 'https://www.yrgopelago.se/test/index.php'
    ]);

    $response = $client->request('POST', 'https://www.yrgopelago.se/centralbank/transferCode', [
        'form_params' => [
            'transfercode' => $transferCode,
        ]
    ]);
}
