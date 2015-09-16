<?php

use Vdbf\Components\Twinfield\Request\Soap\Factory as SoapClientFactory;
use Vdbf\Components\Twinfield\ApiClient;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$options = [
    'credentials' => [
        'user' => '',
        'password' => '',
        'organisation' => ''
    ]
];

$api = new ApiClient(new SoapClientFactory(), $options);

$api->authenticate();