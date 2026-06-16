<?php

declare(strict_types=1);

namespace Componenta\Http\Tests;

use Componenta\Http\Header;
use PHPUnit\Framework\TestCase;

final class HeaderTest extends TestCase
{
    public function testClassifiesCommonHeaderGroups(): void
    {
        self::assertTrue(Header::isRequestHeader(Header::AUTHORIZATION));
        self::assertTrue(Header::isResponseHeader(Header::CONTENT_TYPE));
        self::assertContains(Header::STRICT_TRANSPORT_SECURITY, Header::getSecurityHeaders());
        self::assertContains(Header::CACHE_CONTROL, Header::getCachingHeaders());
        self::assertContains(Header::ORIGIN, Header::getCorsHeaders());
    }
}
