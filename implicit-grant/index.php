<?php

require('config.php');

$query = http_build_query([
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'response_type' => 'token',
    'scope' => '',
]);

header('Location:'.$auth_uri.$query);
