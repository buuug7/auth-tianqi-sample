<?php

// 跳转获取授权码(code)

require ('../config.php');

$query = http_build_query([
    'response_type' => 'code',
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'scope' => ''
]);
header('Location:' . $auth_uri . $query);

