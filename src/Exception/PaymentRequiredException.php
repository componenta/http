<?php

namespace Componenta\Http\Exception;

/**
 * 402 Payment Required
 *
 * Reserved for future use. Some APIs use this for quota/billing.
 */
class PaymentRequiredException extends HttpException
{
    public int $statusCode {
        get => 402;
    }

    protected string $defaultMessage {
        get => 'Payment Required';
    }
}