<?php

declare(strict_types=1);

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 451 Unavailable For Legal Reasons
 *
 * Resource unavailable due to legal demands (censorship, court order, etc.)
 */
class UnavailableForLegalReasonsException extends HttpException
{
    public int $statusCode {
        get => 451;
    }

    protected string $defaultMessage {
        get => 'Unavailable For Legal Reasons';
    }
}
