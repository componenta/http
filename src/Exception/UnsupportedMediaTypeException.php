<?php

namespace Componenta\Http\Exception;

/**
 * 415 Unsupported Media Type
 *
 * The request Content-Type is not supported.
 */
class UnsupportedMediaTypeException extends HttpException
{
    public int $statusCode {
        get => 415;
    }

    protected string $defaultMessage {
        get => 'Unsupported Media Type';
    }
}