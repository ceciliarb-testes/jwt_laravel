<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
    // header('Access-Control-Allow-Origin: http://127.0.0.1:7000');
    // header('Access-Control-Allow-Credentials: true');
    // header('Access-Control-Allow-Headers: X-Requested-With, Authorization');
    // header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    // header('Accept: text/html, application/json, application/xhtml+xml, application/x-www-form-urlencoded, application/xml;q=0.9, image/webp, */*;q=0.8');
       
    'supportsCredentials' => true,
    'allowedOrigins' => ['http://127.0.0.1:7000'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['*'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
