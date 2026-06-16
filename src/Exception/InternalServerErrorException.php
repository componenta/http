<?php

namespace Componenta\Http\Exception;

/**
 * 500 Internal Server Error
 *
 * Generic server error when no more specific error applies.
 */
class InternalServerErrorException extends HttpException
{
    public int $statusCode {
        get => 500;
    }

    protected string $defaultMessage {
        get => 'Internal Server Error';
    }
}