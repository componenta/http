<?php

namespace Componenta\Http\Exception;

/**
 * 421 Misdirected Request
 *
 * The request was directed to a server unable to produce a response.
 */
class MisdirectedRequestException extends HttpException
{
    public int $statusCode {
        get => 421;
    }

    protected string $defaultMessage {
        get => 'Misdirected Request';
    }
}