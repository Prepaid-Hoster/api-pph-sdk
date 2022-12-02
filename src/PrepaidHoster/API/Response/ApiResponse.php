<?php

namespace PrepaidHoster\Api\Response;

use PrepaidHoster\Api\Support\AdvancedArray;

class ApiResponse
{
    /**
     * The original response
     * @var mixed
     */
    private mixed $originalResponse;
    private int $responseCode;

    /**
     * The response data
     * @var AdvancedArray
     */
    private AdvancedArray $response;

    /**
     * @var AdvancedArray
     */
    private AdvancedArray $responseHeaders;

    /**
     * @param  int  $code
     * @param  string  $response
     * @param  array  $headers
     */
    public function __construct(int $code, string $response, array $headers)
    {
        $this->responseCode = $code;
        $this->originalResponse = $response;
        $this->response = new AdvancedArray($this->toArray());
        $this->responseHeaders = new AdvancedArray($headers);
    }

    /**
     * @return AdvancedArray
     */
    public function getResponseHeaders(): AdvancedArray
    {
        return $this->responseHeaders;
    }

    /**
     * @return mixed
     */
    public function getOriginalResponse(): mixed
    {
        return $this->originalResponse;
    }

    /**
     * @return int
     */
    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    /**
     * Get a value from the response
     * @param  string  $key
     * @param $default
     * @return mixed|null
     */
    public function get(string $key, $default = null): mixed
    {
        return $this->response->get($key, $default);
    }

    /**
     * Convert the response to an array
     *
     * @return array
     */
    public function toArray(): array
    {
        try {
            return json_decode($this->originalResponse, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            return [];
        }
    }

    /**
     * Returns whether the response code starts with 2 (ok-range)
     *
     * @return bool
     */
    public function isOk()
    {
        return str_starts_with($this->responseCode, '2');
    }
}