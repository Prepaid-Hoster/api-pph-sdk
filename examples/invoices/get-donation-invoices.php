<?php
/** @var ApiClient $apiClient */

use PrepaidHoster\Api\ApiClient;

$apiClient = include __DIR__ . "/../api.php";

$donationInvoices = $apiClient->get('client/invoices', [
    'type' => 'donation'
]);

$sum = 0;
foreach($donationInvoices->get('data') as $invoice) {
    $date = strtotime($invoice['date']);
    echo date("d.m.Y", $date) . " - Spende i.H.v ". number_format($invoice['total'], 2) . "€ von " . $invoice['items'][0]['donator_name'] . PHP_EOL;
    $sum += $invoice['total'];
} // foreach end

echo "Total: Gespendet: " . $sum . "€";