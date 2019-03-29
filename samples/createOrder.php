<?php

$data = [
    'customer_id' => '1',
    'products' => [
        [
            'product_id' => '1',
            'price' => '9.99',
            'quantity' => '1'
        ],
        [
            'product_id' => '2',
            'price' => '5.95',
            'quantity' => '1'
        ]
    ],
];

$payload = json_encode($data);

$url = 'http://localhost:3333/api/Order/create';
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