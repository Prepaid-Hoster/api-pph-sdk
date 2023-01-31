<?php

namespace PrepaidHoster\Api;

use JsonException;
use PrepaidHoster\Api\Exceptions\ApiCallErrorException;
use PrepaidHoster\Api\Response\ApiResponse;
use PrepaidHoster\Api\Scopes\HostingActionScope;
use PrepaidHoster\Api\Support\HeadersToArray;

class ApiClient
{
    private ApiConfiguration $configuration;

    public function __construct(ApiConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @param  ApiConfiguration  $configuration
     */
    public function setConfiguration(ApiConfiguration $configuration): void
    {
        $this->configuration = $configuration;
    }

    /**
     * @return ApiConfiguration
     */
    public function getConfiguration(): ApiConfiguration
    {
        return $this->configuration;
    }

    /**
     * Call API
     *
     * Makes a call against the API and returns its result
     *
     * @throws JsonException
     * @throws ApiCallErrorException
     */
    public function call($method, $url, $query = [], $body = [], $additionalHeaders = [])
    {
        $url = rtrim("https://".$this->configuration->get("base", "api.pph.sh"), "/")."/".ltrim($url, "/");

        if (empty($query) === false) {
            $url .= !strpos($url, "?") ? '?' : '&';
            $url .= http_build_query($query);
        } // if end

        $headers["Authorization"] = "Bearer ".$this->configuration->get("token");
        $headers["Content-Type"] = "application/json";
        $headers["Accept"] = "application/json";
        $headers["Connection"] = "Close";
        $headers["Accept-Language"] = $this->configuration->get("lang", "de")."; *;q=0.5";

        foreach ($this->configuration->get("headers", []) as $k => $v) {
            $headers[$k] = $v;
        } // foreach end

        foreach ($additionalHeaders as $k => $v) {
            $headers[$k] = $v;
        } // foreach end

        $strHeaders = [];
        foreach ($headers as $k => $v) {
            $strHeaders[] = sprintf("%s: %s", $k, $v);
        } // foreach end

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER => $strHeaders,
            CURLOPT_POSTFIELDS => json_encode($body, JSON_THROW_ON_ERROR),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_TIMEOUT_MS => $this->configuration->get("timeout", 15000)
        ]);

        $output = curl_exec($ch);
        $err = curl_errno($ch);
        $errStr = curl_error($ch);

        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $responseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

        $headerStr = substr($output, 0, $headerSize);
        $bodyStr = substr($output, $headerSize);
        $responseHeaders = HeadersToArray::parse($headerStr);
        curl_close($ch);

        if($err) {
            throw new ApiCallErrorException($errStr, 0, 0, null);
        } // if end

        if ($responseCode >= 400) {
            $message = "";
            if ($errorResource = @json_decode($bodyStr, true, 512, JSON_THROW_ON_ERROR)) {
                $message = $errorResource["data"]["message"] ?? $bodyStr;
            } // if end
            throw new ApiCallErrorException("There was an HTTP error in $url: $responseCode - $message", 0, $responseCode, $bodyStr);
        } // if end

        return new ApiResponse($url, $responseCode, $bodyStr, $responseHeaders);
    }

    /**
     * @param $url
     * @param  array  $query
     * @param  array  $body
     * @param  array  $additionalHeaders
     * @return ApiResponse
     * @throws ApiCallErrorException
     * @throws JsonException
     */
    public function get($url, array $query = [], array $body = [], array $additionalHeaders = [])
    {
        return $this->call("GET", $url, $query, $body, $additionalHeaders);
    }

    /**
     * @param $url
     * @param $query
     * @param $body
     * @param $additionalHeaders
     * @return ApiResponse
     * @throws ApiCallErrorException
     * @throws JsonException
     */
    public function post($url, $query = [], $body = [], $additionalHeaders = [])
    {
        return $this->call("POST", $url, $query, $body, $additionalHeaders);
    }

    public function hosting(int $hostingId): HostingActionScope
    {
        return new HostingActionScope($hostingId, $this);
    }
}