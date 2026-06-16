<?php

namespace Componenta\Http\Exception;

/**
 * 504 Gateway Timeout
 *
 * The server did not receive a timely response from an upstream server.
 */
class GatewayTimeoutException extends HttpException
{
    public int $statusCode {
        get => 504;
    }

    protected string $defaultMessage {
        get => 'Gateway Timeout';
    }
}