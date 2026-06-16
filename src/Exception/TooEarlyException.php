<?php

namespace Componenta\Http\Exception;

/**
 * 425 Too Early
 *
 * The server is unwilling to risk processing a request
 * that might be replayed (TLS Early Data).
 */
class TooEarlyException extends HttpException
{
    public int $statusCode {
        get => 425;
    }

    protected string $defaultMessage {
        get => 'Too Early';
    }
}