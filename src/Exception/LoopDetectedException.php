<?php

namespace Componenta\Http\Exception;

/**
 * 508 Loop Detected
 *
 * The server detected an infinite loop while processing the request (WebDAV).
 */
class LoopDetectedException extends HttpException
{
    public int $statusCode {
        get => 508;
    }

    protected string $defaultMessage {
        get => 'Loop Detected';
    }
}