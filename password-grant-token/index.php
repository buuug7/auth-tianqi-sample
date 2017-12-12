<?php

require('../vendor/autoload.php');
require('config.php');


$http = new \GuzzleHttp\Client;

$response = $http->post($auth_get_token_uri, [
    'form_params' => [
        'grant_type' => 'password',
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'username' => $username,
        'password' => $password,
        'scope' => '',
    ],
]);

$response = json_decode((string)($response->getBody()), true);

$access_token = $response['access_token'];
$refresh_token = $response['refresh_token'];


echo <<<HTML
<h4>原始access_token</h4>
<p>{$access_token}</p>
<h4>原始refresh_token</h4>
<p>{$refresh_token}</p>
HTML;


//
// 获取用户信息
//
$user = $http->get('http://user.tq0.com/api/user', [
    'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $access_token,
    ]
]);
echo <<<HTML
<h4>用户信息</h4>
<p>{$user->getBody()}</p>
HTML;


//
// 刷新access_token
//
$responseNew = $http->post($auth_get_token_uri, [
    'form_params' => [
        'grant_type' => 'refresh_token',
        'refresh_token' => $refresh_token,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'scope' => '',
    ]
]);

$responseNew=json_decode((string)$responseNew->getBody(),true);
$access_token_new=$responseNew['access_token'];

echo <<<HTML
<hr>
<h4>刷新后的access_token</h4>
<p>{$access_token_new}</p>
HTML;
