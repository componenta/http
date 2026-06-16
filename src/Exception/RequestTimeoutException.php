<?php

namespace Componenta\Http\Exception;

/**
 * 408 Request Timeout
 *
 * The server timed out waiting for the request.
 */
class RequestTimeoutException extends HttpException
{
    public int $statusCode {
        get => 408;
    }

    protected string $defaultMessage {
        get => 'Request Timeout';
    }
}