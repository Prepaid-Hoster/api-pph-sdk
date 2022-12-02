<?php

namespace PrepaidHoster\Api;

class ApiConfiguration
{
    private array $config;

    /**
     * @param  array{
     *     base: string,
     *     token: string,
     *     headers: array<string, string>,
     *  }  $config
     */
    public function __construct(array $config)
    {
        if(!isset($config["headers"])) {
            $config["headers"] = [];
        } // if end

        $this->config = $config;
    }

    public function get(string $key, $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    public function setHeader(string $key, $value): void
    {
        $this->config["headers"][$key] = $value;
    }
}