<?php

namespace Componenta\Http\Exception;

/**
 * 502 Bad Gateway
 *
 * The server received an invalid response from an upstream server.
 */
class BadGatewayException extends HttpException
{
    public int $statusCode {
        get => 502;
    }

    protected string $defaultMessage {
        get => 'Bad Gateway';
    }
}