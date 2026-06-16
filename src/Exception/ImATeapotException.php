<?php

namespace Componenta\Http\Exception;

/**
 * 418 I'm a teapot
 *
 * RFC 2324 - Hyper Text Coffee Pot Control Protocol
 */
class ImATeapotException extends HttpException
{
    public int $statusCode {
        get => 418;
    }

    protected string $defaultMessage {
        get => "I'm a teapot";
    }
}
