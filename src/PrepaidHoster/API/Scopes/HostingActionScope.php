<?php

namespace PrepaidHoster\Api\Scopes;

use PrepaidHoster\Api\ApiClient;
use PrepaidHoster\Api\Response\ApiResponse;

class HostingActionScope extends AbstractScope
{
    public function __construct(private int $hostingId, ApiClient $client)
    {
        parent::__construct($client);
    }

    public function read($url, $params = []): ApiResponse
    {
        $prefix = "client/hostings/{$this->hostingId}/actions/read";
        $response = $this->client->call("GET", "$prefix/{$url}", $params);
        return $response;
    }

    public function write($url, $params = []): ApiResponse
    {
        $prefix = "client/hostings/{$this->hostingId}/actions/write";
        return $this->client->call("POST", "$prefix/{$url}", $params);
    }
}