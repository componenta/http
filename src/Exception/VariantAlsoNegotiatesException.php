<?php

namespace Componenta\Http\Exception;

/**
 * 506 Variant Also Negotiates
 *
 * Content negotiation resulted in a circular reference.
 */
class VariantAlsoNegotiatesException extends HttpException
{
    public int $statusCode {
        get => 506;
    }

    protected string $defaultMessage {
        get => 'Variant Also Negotiates';
    }
}