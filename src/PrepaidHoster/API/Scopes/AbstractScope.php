<?php

namespace PrepaidHoster\Api\Scopes;

use PrepaidHoster\Api\ApiClient;

abstract class AbstractScope
{
    public function __construct(protected ApiClient $client)
    {

    }
}