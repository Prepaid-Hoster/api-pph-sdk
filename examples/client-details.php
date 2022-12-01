<?php
/** @var ApiClient $apiClient */

use PrepaidHoster\Api\ApiClient;

$apiClient = include "api.php";

$clientData = $apiClient->get("client");

echo "Firstname: " . $clientData->get("data.firstname") . PHP_EOL;
echo "Lastname: " . $clientData->get("data.lastname") . PHP_EOL;
echo "Email: " . $clientData->get("data.email") . PHP_EOL;
echo "Address: " . $clientData->get("data.address1") . PHP_EOL;
echo "City: " . $clientData->get("data.city") . PHP_EOL;
echo "Zip: " . $clientData->get("data.postcode") . PHP_EOL;
echo "Country: " . $clientData->get("data.country") . PHP_EOL;
echo "Phone: " . $clientData->get("data.phonenumber") . PHP_EOL;
echo "Credit: " . $clientData->get("data.credit") . PHP_EOL;