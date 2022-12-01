<?php

use PrepaidHoster\Api\ApiClient;
use PrepaidHoster\Api\ApiConfiguration;

include "../vendor/autoload.php";

if(!file_exists("example-config.php")) {
    echo "Please copy example-config.php.dist to example-config.php and fill in your credentials.".PHP_EOL;
    exit(1);
} // if end

require_once "example-config.php";

return new ApiClient(new ApiConfiguration(["token" => API_TOKEN, "base" => API_BASE]));
