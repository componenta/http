<?php

namespace Componenta\Http\Exception;

/**
 * 417 Expectation Failed
 *
 * The server cannot meet requirements of Expect header.
 */
class ExpectationFailedException extends HttpException
{
    public int $statusCode {
        get => 417;
    }

    protected string $defaultMessage {
        get => 'Expectation Failed';
    }
}