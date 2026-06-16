<?php

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 416 Range Not Satisfiable
 *
 * The requested range cannot be satisfied.
 */
class RangeNotSatisfiableException extends HttpException
{
    public function __construct(
        public private(set) readonly int $totalSize,
        string                           $message = '',
        ?Throwable                       $previous = null,
    )
    {
        parent::__construct($message, $previous);

        $this->withHeader('Content-Range', "bytes */{$this->totalSize}");
    }

    public int $statusCode {
        get => 416;
    }

    protected string $defaultMessage {
        get => 'Range Not Satisfiable';
    }
}
