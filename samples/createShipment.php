<?php

$data = [
    'customer_id' => '16',
    'customer_address' => '21 Ventor Close, Great Sankey, Warrington, WA53JL',
    'billing_address' => '21 Ventor Close, Great Sankey, Warrington, WA53JL',
    'order_id' => '16',
    'order_price' => '15.94',
    'delivery_cost' => '2.95',
    'total_cost' => '18.89',
];

$payload = json_encode($data);

$url = 'http://localhost:3333/api/Shipment/create';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload))
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$result = curl_exec($ch);
curl_close($ch);

echo "<pre>";
print_r($result);
echo "</pre>";