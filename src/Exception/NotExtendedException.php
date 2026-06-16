<?php

declare(strict_types=1);

namespace Componenta\Http\Exception;

/**
 * 510 Not Extended
 *
 * Further extensions to the request are required for the server to fulfill it.
 */
class NotExtendedException extends HttpException
{
    public int $statusCode {
        get => 510;
    }

    protected string $defaultMessage {
        get => 'Not Extended';
    }
}
