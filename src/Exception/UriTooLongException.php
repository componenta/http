<?php

namespace Componenta\Http\Exception;

/**
 * 414 URI Too Long
 *
 * The request URI exceeds server limits.
 */
class UriTooLongException extends HttpException
{
    public int $statusCode {
        get => 414;
    }

    protected string $defaultMessage {
        get => 'URI Too Long';
    }
}