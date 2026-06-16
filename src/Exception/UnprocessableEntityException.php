<?php

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 422 Unprocessable Entity
 *
 * The request was well-formed but contains semantic errors.
 * Common for validation failures.
 */
class UnprocessableEntityException extends HttpException
{
    /**
     * @param array<string, list<string>> $errors Validation errors by field
     */
    public function __construct(
        public private(set) readonly array $errors = [],
        string                             $message = '',
        ?Throwable                         $previous = null,
    )
    {
        parent::__construct($message, $previous);
    }

    public int $statusCode {
        get => 422;
    }

    protected string $defaultMessage {
        get => 'Unprocessable Entity';
    }
}
