<?php

declare(strict_types=1);

namespace Componenta\Http;

/**
 * HTTP method value object with support for custom methods
 *
 * Provides type-safe HTTP method handling with methods to determine
 * safety, idempotency, and body requirements according to RFC 9110.
 * Supports both standard and custom HTTP methods.
 *
 * @link https://www.rfc-editor.org/rfc/rfc9110.html#name-methods
 */
final class HttpMethod implements \Stringable
{
    // Standard HTTP methods
    public const string GET = 'GET';
    public const string POST = 'POST';
    public const string PUT = 'PUT';
    public const string DELETE = 'DELETE';
    public const string PATCH = 'PATCH';
    public const string HEAD = 'HEAD';
    public const string OPTIONS = 'OPTIONS';
    public const string TRACE = 'TRACE';
    public const string CONNECT = 'CONNECT';

    /**
     * @var string Normalized HTTP method name (uppercase, trimmed)
     */
    public readonly string $value;

    /**
     * Check if the HTTP method is safe (read-only, no side effects)
     *
     * Safe methods: GET, HEAD, OPTIONS, TRACE
     * Custom methods are not considered safe
     *
     * @link https://www.rfc-editor.org/rfc/rfc9110.html#name-safe-methods
     */
    public bool $isSafe {
        get {
            return match ($this->value) {
                self::GET, self::HEAD, self::OPTIONS, self::TRACE => true,
                default => false,
            };
        }
    }

    /**
     * Check if the HTTP method is idempotent
     *
     * Idempotent methods produce the same result when called multiple times
     * Idempotent methods: GET, HEAD, OPTIONS, TRACE, PUT, DELETE
     * Custom methods are not considered idempotent by default
     *
     * @link https://www.rfc-editor.org/rfc/rfc9110.html#name-idempotent-methods
     */
    public bool $isIdempotent {
        get {
            return match ($this->value) {
                self::GET, self::HEAD, self::OPTIONS, self::TRACE,
                self::PUT, self::DELETE => true,
                default => false,
            };
        }
    }

    /**
     * Check if the HTTP method is cacheable by default
     *
     * Cacheable methods: GET, HEAD
     * Custom methods are not cacheable by default
     *
     * @link https://www.rfc-editor.org/rfc/rfc9110.html#name-cacheable-methods
     */
    public bool $isCacheable {
        get {
            return match ($this->value) {
                self::GET, self::HEAD => true,
                default => false,
            };
        }
    }

    /**
     * Check if the HTTP method typically requires a request body
     *
     * Methods like POST, PUT, PATCH usually carry a payload
     * Custom methods are assumed to not require a body by default
     */
    public bool $requiresBody {
        get {
            return match ($this->value) {
                self::POST, self::PUT, self::PATCH => true,
                default => false,
            };
        }
    }

    /**
     * Check if this is a standard HTTP method
     */
    public bool $isStandard {
        get {
            static $values = array_flip(self::standardValues());
            return isset($values[$this->value]);
        }
    }

    /**
     * Check if this is a custom (non-standard) HTTP method
     */
    public bool $isCustom {
        get {
            return !$this->isStandard;
        }
    }

    /**
     * Constructor
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $normalized = self::normalize($value);

        if ($normalized === '') {
            throw new \InvalidArgumentException('HTTP method cannot be empty');
        }

        $this->value = $normalized;
    }

    /**
     * Create GET method instance
     */
    public static function get(): self
    {
        return new self(self::GET);
    }

    /**
     * Create POST method instance
     */
    public static function post(): self
    {
        return new self(self::POST);
    }

    /**
     * Create PUT method instance
     */
    public static function put(): self
    {
        return new self(self::PUT);
    }

    /**
     * Create DELETE method instance
     */
    public static function delete(): self
    {
        return new self(self::DELETE);
    }

    /**
     * Create PATCH method instance
     */
    public static function patch(): self
    {
        return new self(self::PATCH);
    }

    /**
     * Create HEAD method instance
     */
    public static function head(): self
    {
        return new self(self::HEAD);
    }

    /**
     * Create OPTIONS method instance
     */
    public static function options(): self
    {
        return new self(self::OPTIONS);
    }

    /**
     * Create TRACE method instance
     */
    public static function trace(): self
    {
        return new self(self::TRACE);
    }

    /**
     * Create CONNECT method instance
     */
    public static function connect(): self
    {
        return new self(self::CONNECT);
    }

    /**
     * Check if the HTTP method is safe (read-only, no side effects)
     *
     * Safe methods: GET, HEAD, OPTIONS, TRACE
     * Custom methods are not considered safe
     *
     * @link https://www.rfc-editor.org/rfc/rfc9110.html#name-safe-methods
     */
    public static function isSafe(string $method): bool
    {
        return match (self::normalize($method)) {
            self::GET, self::HEAD, self::OPTIONS, self::TRACE => true,
            default => false,
        };
    }

    /**
     * Check if the HTTP method is idempotent
     *
     * Idempotent methods produce the same result when called multiple times
     * Idempotent methods: GET, HEAD, OPTIONS, TRACE, PUT, DELETE
     * Custom methods are not considered idempotent by default
     *
     * @link https://www.rfc-editor.org/rfc/rfc9110.html#name-idempotent-methods
     */
    public static function isIdempotent(string $method): bool
    {
        return match (self::normalize($method)) {
            self::GET, self::HEAD, self::OPTIONS, self::TRACE,
            self::PUT, self::DELETE => true,
            default => false,
        };
    }

    /**
     * Check if the HTTP method is cacheable by default
     *
     * Cacheable methods: GET, HEAD
     * Custom methods are not cacheable by default
     *
     * @link https://www.rfc-editor.org/rfc/rfc9110.html#name-cacheable-methods
     */
    public static function isCacheable(string $method): bool
    {
        return match (self::normalize($method)) {
            self::GET, self::HEAD => true,
            default => false,
        };
    }

    /**
     * Check if the HTTP method typically requires a request body
     *
     * Methods like POST, PUT, PATCH usually carry a payload
     * Custom methods are assumed to not require a body by default
     */
    public static function requiresBody(string $method): bool
    {
        return match (self::normalize($method)) {
            self::POST, self::PUT, self::PATCH => true,
            default => false,
        };
    }

    /**
     * Check if a string represents a standard HTTP method
     *
     * @param string $method Method string to check
     * @return bool
     */
    public static function isStandardMethod(string $method): bool
    {
        return in_array(self::normalize($method), self::standardValues(), true);
    }

    /**
     * Get all safe HTTP methods
     *
     * @return array<HttpMethod>
     */
    public static function safeMethods(): array
    {
        return [
            self::get(),
            self::head(),
            self::options(),
            self::trace(),
        ];
    }

    /**
     * Get all idempotent HTTP methods
     *
     * @return array<HttpMethod>
     */
    public static function idempotentMethods(): array
    {
        return [
            self::get(),
            self::head(),
            self::options(),
            self::trace(),
            self::put(),
            self::delete(),
        ];
    }

    /**
     * Normalize method string to uppercase
     *
     * @param string $method HTTP method string in any case
     * @return string Uppercase method string
     */
    public static function normalize(string $method): string
    {
        return strtoupper(trim($method));
    }

    /**
     * Get all standard HTTP method values
     *
     * @return array<string>
     */
    public static function standardValues(): array
    {
        return [
            self::GET,
            self::POST,
            self::PUT,
            self::DELETE,
            self::PATCH,
            self::HEAD,
            self::OPTIONS,
            self::TRACE,
            self::CONNECT,
        ];
    }

    /**
     * Get all standard HTTP methods as HttpMethod instances
     *
     * @return array<HttpMethod>
     */
    public static function all(): array
    {
        return [
            self::get(),
            self::post(),
            self::put(),
            self::delete(),
            self::patch(),
            self::head(),
            self::options(),
            self::trace(),
            self::connect(),
        ];
    }

    /**
     * Alias for standardValues() - returns standard method strings
     *
     * @return array<string>
     */
    public static function allValues(): array
    {
        return self::standardValues();
    }

    /**
     * Create HttpMethod instance from string with normalization
     *
     * Supports both standard and custom HTTP methods
     *
     * @param string $method HTTP method string (case-insensitive)
     * @return self
     * @throws \InvalidArgumentException if method string is empty
     */
    public static function from(string $method): self
    {
        return new self($method);
    }

    /**
     * Try to create HttpMethod instance from string, return null if invalid
     *
     * @param string $method HTTP method string (case-insensitive)
     * @return self|null Null if method string is empty, otherwise HttpMethod instance
     */
    public static function tryFrom(string $method): ?self
    {
        $normalized = self::normalize($method);

        if ($normalized === '') {
            return null;
        }

        return new self($normalized);
    }

    /**
     * Compare this method with another for equality
     *
     * @param HttpMethod|string $other Method to compare with
     * @return bool
     */
    public function equals(HttpMethod|string $other): bool
    {
        $otherValue = $other instanceof self ? $other->value : self::normalize($other);
        return $this->value === $otherValue;
    }

    /**
     * Convert to string representation
     *
     * @return string The HTTP method value
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
