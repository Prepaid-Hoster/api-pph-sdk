<?php

namespace PrepaidHoster\Api\Exceptions;

use Exception;
use Throwable;

class ApiCallErrorException extends Exception
{
    private int $statusCode;
    private mixed $originalContent;

    public function __construct(string $message = "", int $code = 0, int $statusCode = 0, mixed $originalContent = null, ?Throwable $previous = null)
    {
        $this->statusCode = $statusCode;
        $this->originalContent = $originalContent;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return mixed
     */
    public function getOriginalContent(): mixed
    {
        return $this->originalContent;
    }
}