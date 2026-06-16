<?php

namespace Componenta\Http\Exception;

/**
 * 424 Failed Dependency
 *
 * The request failed due to failure of a previous request (WebDAV).
 */
class FailedDependencyException extends HttpException
{
    public int $statusCode {
        get => 424;
    }

    protected string $defaultMessage {
        get => 'Failed Dependency';
    }
}