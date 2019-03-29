<?php

$url = 'http://localhost:3333/api/Order/filter/?when=today&type=date&order=ASC&status=4';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

$result = curl_exec($ch);
curl_close($ch);

echo "<pre>";
print_r($result);
echo "</pre>";