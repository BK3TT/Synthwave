<?php

$data = [
    'firstname' => 'Lauren',
    'surname' => 'Devlin',
    'email' => 'laaaurendevlin@gmail.com',
    'house' => '21',
    'address' => 'Ventor Close',
    'address2' => 'Great Sankey',
    'city' => 'Warrington',
    'postcode' => 'WA53JL'
];

$payload = json_encode($data);

$url = 'http://localhost:3333/api/Customer/create';
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