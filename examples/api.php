<?php

use PrepaidHoster\Api\ApiClient;
use PrepaidHoster\Api\ApiConfiguration;

include __DIR__ . "/../vendor/autoload.php";

$configPath = __DIR__ . "/example-config.php";

if(!file_exists($configPath)) {
    echo "Please copy example-config.php.dist to example-config.php and fill in your credentials.".PHP_EOL;
    exit(1);
} // if end

require_once $configPath;

$configArray = [
    "base" => API_BASE
];

if(strlen(API_IMPERSONATE)) {
    $configArray["headers"] = [
        "X-Impersonate" => API_IMPERSONATE,
        "X-Key" => API_INTERNAL_TOKEN
    ];
} // if end
else {
    $configArray["token"] = API_TOKEN;
} // else end

return new ApiClient(new ApiConfiguration($configArray));
