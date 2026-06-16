<?php

namespace Componenta\Http\Exception;

/**
 * 507 Insufficient Storage
 *
 * The server cannot store the representation needed to complete the request (WebDAV).
 */
class InsufficientStorageException extends HttpException
{
    public int $statusCode {
        get => 507;
    }

    protected string $defaultMessage {
        get => 'Insufficient Storage';
    }
}