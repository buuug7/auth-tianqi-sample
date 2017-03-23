<?php

require('../vendor/autoload.php');
require ('config.php');

$http = new \GuzzleHttp\Client();

$response = $http->post($auth_get_token_uri, [
    'form_params' => [
        'grant_type' => 'client_credentials',
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'scope' => '',
    ],
]);

$response=json_decode((string)$response->getBody(),true);

$access_token=$response['access_token'];

echo $access_token;