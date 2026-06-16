<?php

namespace Componenta\Http\Exception;

/**
 * 404 Not Found
 *
 * The requested resource could not be found.
 */
class NotFoundException extends HttpException
{
    public int $statusCode {
        get => 404;
    }

    protected string $defaultMessage {
        get => 'Not Found';
    }
}