<?php

$url           = 'https://accounts.google.com/o/oauth2/token';
$client_id     = '322722302859-lunltpnv554tb281c256echsocqpvqfs.apps.googleusercontent.com';
$client_secret = '3d6swWg6S0FaHzdREb9aJnj9';
$refresh_token = '1//04ardKc3iOuiZCgYIARAAGAQSNwF-L9Ir1Zen2zlbtQjQu9clEDvzAXY5OfuyVj1OyBj625iTD12Cd-_aHyXdqxC4z2jfofh1hl4';
$grant_type    = 'refresh_token';
// $ch = curl_init($url);
// $payload = json_encode($myBody);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $myBody);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', $authorization));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// // Execute the POST request
// $result = curl_exec($ch);

// // Close cURL resource
// curl_close($ch);
// // return response()->json($result);
// // return $this->sendResponse(json_encode($result), 'Google analytics response');
// print_r($result);



$postRequest = array(
    'grant_type'    => $grant_type,
    'client_id'     => $client_id,
    'client_secret' => $client_secret,
    'refresh_token' => $refresh_token
);

$cURLConnection = curl_init($url);
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);

// $apiResponse - available data from the API request
$jsonArrayResponse = json_decode($apiResponse);
print_r($jsonArrayResponse);

?>