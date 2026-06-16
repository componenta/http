<?php

declare(strict_types=1);

namespace Componenta\Http;

/**
 * HTTP Header names constants
 *
 * Provides type-safe header name constants to avoid typos
 * and enable IDE autocompletion.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
 * @see https://www.iana.org/assignments/http-fields/http-fields.xhtml
 */
final class Header
{

    /** RFC 7235 - Credentials for authenticating the client */
    public const string AUTHORIZATION = 'Authorization';

    /** RFC 7235 - Credentials for authenticating with a proxy */
    public const string PROXY_AUTHORIZATION = 'Proxy-Authorization';

    /** RFC 7235 - Authentication method for accessing a resource */
    public const string WWW_AUTHENTICATE = 'WWW-Authenticate';

    /** RFC 7235 - Authentication method for accessing a proxy */
    public const string PROXY_AUTHENTICATE = 'Proxy-Authenticate';


    /** RFC 7234 - Directives for caching mechanisms */
    public const string CACHE_CONTROL = 'Cache-Control';

    /** RFC 7234 - Clears browsing data (cache, cookies, storage) */
    public const string CLEAR_SITE_DATA = 'Clear-Site-Data';

    /** RFC 7232 - Resource version identifier */
    public const string ETAG = 'ETag';

    /** RFC 7234 - Date/time after which response is stale */
    public const string EXPIRES = 'Expires';

    /** RFC 7232 - Last modification date of the resource */
    public const string LAST_MODIFIED = 'Last-Modified';

    /** RFC 7232 - Conditional request based on ETag */
    public const string IF_MATCH = 'If-Match';

    /** RFC 7232 - Conditional request based on modification date */
    public const string IF_MODIFIED_SINCE = 'If-Modified-Since';

    /** RFC 7232 - Conditional request based on ETag (inverse) */
    public const string IF_NONE_MATCH = 'If-None-Match';

    /** RFC 7232 - Conditional request based on modification date (inverse) */
    public const string IF_UNMODIFIED_SINCE = 'If-Unmodified-Since';

    /** RFC 7234 - HTTP/1.0 caching directive (deprecated) */
    public const string PRAGMA = 'Pragma';

    /** RFC 7234 - Information about response freshness */
    public const string AGE = 'Age';

    /** RFC 5861 - Serve stale content while revalidating */
    public const string STALE_WHILE_REVALIDATE = 'Stale-While-Revalidate';

    /** RFC 5861 - Serve stale content if error */
    public const string STALE_IF_ERROR = 'Stale-If-Error';
    // Content Negotiation (Request)

    /** RFC 7231 - Acceptable media types */
    public const string ACCEPT = 'Accept';

    /** RFC 7231 - Acceptable character sets */
    public const string ACCEPT_CHARSET = 'Accept-Charset';

    /** RFC 7231 - Acceptable content encodings */
    public const string ACCEPT_ENCODING = 'Accept-Encoding';

    /** RFC 7231 - Acceptable languages */
    public const string ACCEPT_LANGUAGE = 'Accept-Language';

    /** RFC 7233 - Acceptable range types */
    public const string ACCEPT_RANGES = 'Accept-Ranges';
    // Content Information (Response)

    /** RFC 7231 - Media type of the body */
    public const string CONTENT_TYPE = 'Content-Type';

    /** RFC 7230 - Size of the body in bytes */
    public const string CONTENT_LENGTH = 'Content-Length';

    /** RFC 7231 - Encoding applied to the body */
    public const string CONTENT_ENCODING = 'Content-Encoding';

    /** RFC 7231 - Natural language of the content */
    public const string CONTENT_LANGUAGE = 'Content-Language';

    /** RFC 7231 - Alternate location for the resource */
    public const string CONTENT_LOCATION = 'Content-Location';

    /** RFC 7233 - Position in the full resource (partial content) */
    public const string CONTENT_RANGE = 'Content-Range';

    /** RFC 6266 - How to display the response (attachment/inline) */
    public const string CONTENT_DISPOSITION = 'Content-Disposition';

    /** RFC 3230 - Hash digest of the body */
    public const string CONTENT_DIGEST = 'Content-Digest';

    /** Deprecated - MD5 digest of the body */
    public const string CONTENT_MD5 = 'Content-MD5';


    /** RFC 7230 - Control options for the connection */
    public const string CONNECTION = 'Connection';

    /** RFC 7230 - Keep connection alive settings */
    public const string KEEP_ALIVE = 'Keep-Alive';

    /** RFC 7230 - Request upgrade to different protocol */
    public const string UPGRADE = 'Upgrade';


    /** RFC 7231 - Address of the requesting client */
    public const string FROM = 'From';

    /** RFC 7231 - Entity name of the server */
    public const string HOST = 'Host';

    /** RFC 7231 - Address of the previous page */
    public const string REFERER = 'Referer';

    /** RFC 7231 - User agent string */
    public const string USER_AGENT = 'User-Agent';


    /** RFC 7231 - HTTP methods supported by the resource */
    public const string ALLOW = 'Allow';

    /** RFC 7231 - Date/time the message was sent */
    public const string DATE = 'Date';

    /** RFC 7231 - URL to redirect to */
    public const string LOCATION = 'Location';

    /** RFC 7231 - Delay in seconds before retrying */
    public const string RETRY_AFTER = 'Retry-After';

    /** RFC 7231 - Server software information */
    public const string SERVER = 'Server';

    /** Response header sources for debugging */
    public const string VIA = 'Via';

    /** RFC 7234 - Caveats about the response */
    public const string WARNING = 'Warning';


    /** RFC 7233 - Conditional range request */
    public const string IF_RANGE = 'If-Range';

    /** RFC 7233 - Request part of a resource */
    public const string RANGE = 'Range';


    /** RFC 6265 - Cookies sent by client */
    public const string COOKIE = 'Cookie';

    /** RFC 6265 - Set cookie in client */
    public const string SET_COOKIE = 'Set-Cookie';
    // CORS (Cross-Origin Resource Sharing)

    /** Indicates the origin of the request */
    public const string ORIGIN = 'Origin';

    /** Allowed origins for cross-origin requests */
    public const string ACCESS_CONTROL_ALLOW_ORIGIN = 'Access-Control-Allow-Origin';

    /** Allowed credentials for cross-origin requests */
    public const string ACCESS_CONTROL_ALLOW_CREDENTIALS = 'Access-Control-Allow-Credentials';

    /** Allowed headers for cross-origin requests */
    public const string ACCESS_CONTROL_ALLOW_HEADERS = 'Access-Control-Allow-Headers';

    /** Allowed methods for cross-origin requests */
    public const string ACCESS_CONTROL_ALLOW_METHODS = 'Access-Control-Allow-Methods';

    /** Headers exposed to the client */
    public const string ACCESS_CONTROL_EXPOSE_HEADERS = 'Access-Control-Expose-Headers';

    /** How long preflight results can be cached */
    public const string ACCESS_CONTROL_MAX_AGE = 'Access-Control-Max-Age';

    /** Headers the client wants to use */
    public const string ACCESS_CONTROL_REQUEST_HEADERS = 'Access-Control-Request-Headers';

    /** Method the client wants to use */
    public const string ACCESS_CONTROL_REQUEST_METHOD = 'Access-Control-Request-Method';

    /** RFC 7034 - Timing information access control */
    public const string TIMING_ALLOW_ORIGIN = 'Timing-Allow-Origin';


    /** Content Security Policy directives */
    public const string CONTENT_SECURITY_POLICY = 'Content-Security-Policy';

    /** CSP report-only mode */
    public const string CONTENT_SECURITY_POLICY_REPORT_ONLY = 'Content-Security-Policy-Report-Only';

    /** Feature policy (renamed to Permissions-Policy) */
    public const string PERMISSIONS_POLICY = 'Permissions-Policy';

    /** Force HTTPS connection */
    public const string STRICT_TRANSPORT_SECURITY = 'Strict-Transport-Security';

    /** Expected Certificate Transparency policy */
    public const string EXPECT_CT = 'Expect-CT';

    /** Prevent MIME type sniffing */
    public const string X_CONTENT_TYPE_OPTIONS = 'X-Content-Type-Options';

    /** DNS prefetch control */
    public const string X_DNS_PREFETCH_CONTROL = 'X-DNS-Prefetch-Control';

    /** Legacy XSS protection (deprecated) */
    public const string X_XSS_PROTECTION = 'X-XSS-Protection';

    /** Clickjacking protection */
    public const string X_FRAME_OPTIONS = 'X-Frame-Options';

    /** Download options for IE */
    public const string X_DOWNLOAD_OPTIONS = 'X-Download-Options';

    /** Certificate pinning (deprecated) */
    public const string PUBLIC_KEY_PINS = 'Public-Key-Pins';

    /** Certificate pinning report-only */
    public const string PUBLIC_KEY_PINS_REPORT_ONLY = 'Public-Key-Pins-Report-Only';

    /** Cross-Origin Embedder Policy */
    public const string CROSS_ORIGIN_EMBEDDER_POLICY = 'Cross-Origin-Embedder-Policy';

    /** Cross-Origin Opener Policy */
    public const string CROSS_ORIGIN_OPENER_POLICY = 'Cross-Origin-Opener-Policy';

    /** Cross-Origin Resource Policy */
    public const string CROSS_ORIGIN_RESOURCE_POLICY = 'Cross-Origin-Resource-Policy';

    /** Referrer policy */
    public const string REFERRER_POLICY = 'Referrer-Policy';


    /** RFC 7230 - Transfer encoding applied to the body */
    public const string TRANSFER_ENCODING = 'Transfer-Encoding';

    /** RFC 7230 - Transfer encoding the client can accept */
    public const string TE = 'TE';

    /** RFC 7230 - Send trailer fields after the body */
    public const string TRAILER = 'Trailer';


    /** RFC 7239 - Original client information through proxy */
    public const string FORWARDED = 'Forwarded';

    /** De facto standard - Original client IP */
    public const string X_FORWARDED_FOR = 'X-Forwarded-For';

    /** De facto standard - Original host requested */
    public const string X_FORWARDED_HOST = 'X-Forwarded-Host';

    /** De facto standard - Original protocol */
    public const string X_FORWARDED_PROTO = 'X-Forwarded-Proto';

    /** De facto standard - Original port */
    public const string X_FORWARDED_PORT = 'X-Forwarded-Port';

    /** Cloudflare - Original client IP */
    public const string CF_CONNECTING_IP = 'CF-Connecting-IP';

    /** AWS/Azure - Original client IP */
    public const string X_REAL_IP = 'X-Real-IP';

    /** Akamai - Original client IP */
    public const string TRUE_CLIENT_IP = 'True-Client-IP';


    /** Request identifier for tracing */
    public const string X_REQUEST_ID = 'X-Request-ID';

    /** Correlation identifier for distributed tracing */
    public const string X_CORRELATION_ID = 'X-Correlation-ID';

    /** W3C Trace Context - Trace parent */
    public const string TRACEPARENT = 'Traceparent';

    /** W3C Trace Context - Trace state */
    public const string TRACESTATE = 'Tracestate';


    /** WebSocket key */
    public const string SEC_WEBSOCKET_KEY = 'Sec-WebSocket-Key';

    /** WebSocket accept */
    public const string SEC_WEBSOCKET_ACCEPT = 'Sec-WebSocket-Accept';

    /** WebSocket protocol */
    public const string SEC_WEBSOCKET_PROTOCOL = 'Sec-WebSocket-Protocol';

    /** WebSocket version */
    public const string SEC_WEBSOCKET_VERSION = 'Sec-WebSocket-Version';

    /** WebSocket extensions */
    public const string SEC_WEBSOCKET_EXTENSIONS = 'Sec-WebSocket-Extensions';
    // Rate Limiting (IETF draft-ietf-httpapi-ratelimit-headers)

    /** Maximum requests allowed in the current window */
    public const string RATELIMIT_LIMIT = 'RateLimit-Limit';

    /** Remaining requests in the current window */
    public const string RATELIMIT_REMAINING = 'RateLimit-Remaining';

    /** Seconds until the window resets */
    public const string RATELIMIT_RESET = 'RateLimit-Reset';

    /** Rate limit policy description */
    public const string RATELIMIT_POLICY = 'RateLimit-Policy';


    /** RFC 7231 - Request particular server behaviors */
    public const string EXPECT = 'Expect';

    /** RFC 7538 - Permanent redirect status */
    public const string LINK = 'Link';

    /** Preferred language for the response */
    public const string PREFER = 'Prefer';

    /** Which preferences were applied */
    public const string PREFERENCE_APPLIED = 'Preference-Applied';

    /** Response varies based on these headers */
    public const string VARY = 'Vary';

    /** Information about source of response */
    public const string SOURCE_MAP = 'SourceMap';

    /** Alternative services for the resource */
    public const string ALT_SVC = 'Alt-Svc';

    /** Server timing metrics */
    public const string SERVER_TIMING = 'Server-Timing';

    /** Service worker navigation preload */
    public const string SERVICE_WORKER_NAVIGATION_PRELOAD = 'Service-Worker-Navigation-Preload';
    // Server-Specific (Non-Standard)

    /** nginx - Internal redirect for file serving */
    public const string X_ACCEL_REDIRECT = 'X-Accel-Redirect';

    /** nginx - Rate limit for file serving */
    public const string X_ACCEL_LIMIT_RATE = 'X-Accel-Limit-Rate';

    /** nginx - Buffering control */
    public const string X_ACCEL_BUFFERING = 'X-Accel-Buffering';

    /** nginx - Charset for file serving */
    public const string X_ACCEL_CHARSET = 'X-Accel-Charset';

    /** nginx - Expiration for file serving */
    public const string X_ACCEL_EXPIRES = 'X-Accel-Expires';

    /** Apache - Internal redirect for file serving */
    public const string X_SENDFILE = 'X-Sendfile';

    /** Lighttpd - Internal redirect for file serving */
    public const string X_LIGHTTPD_SEND_FILE = 'X-Lighttpd-Send-File';


    /** Request client hints */
    public const string ACCEPT_CH = 'Accept-CH';

    /** Client hint - Device memory */
    public const string DEVICE_MEMORY = 'Device-Memory';

    /** Client hint - Effective connection type */
    public const string ECT = 'ECT';

    /** Client hint - Round-trip time */
    public const string RTT = 'RTT';

    /** Client hint - Downlink speed */
    public const string DOWNLINK = 'Downlink';

    /** Client hint - Data saver preference */
    public const string SAVE_DATA = 'Save-Data';

    /** Client hint - Viewport width */
    public const string VIEWPORT_WIDTH = 'Viewport-Width';

    /** Client hint - Device pixel ratio */
    public const string DPR = 'DPR';

    /** Client hint - Width */
    public const string WIDTH = 'Width';

    /** User agent client hints - Architecture */
    public const string SEC_CH_UA_ARCH = 'Sec-CH-UA-Arch';

    /** User agent client hints - Bitness */
    public const string SEC_CH_UA_BITNESS = 'Sec-CH-UA-Bitness';

    /** User agent client hints - Full version list */
    public const string SEC_CH_UA_FULL_VERSION_LIST = 'Sec-CH-UA-Full-Version-List';

    /** User agent client hints - Mobile */
    public const string SEC_CH_UA_MOBILE = 'Sec-CH-UA-Mobile';

    /** User agent client hints - Model */
    public const string SEC_CH_UA_MODEL = 'Sec-CH-UA-Model';

    /** User agent client hints - Platform */
    public const string SEC_CH_UA_PLATFORM = 'Sec-CH-UA-Platform';

    /** User agent client hints - Platform version */
    public const string SEC_CH_UA_PLATFORM_VERSION = 'Sec-CH-UA-Platform-Version';


    /** Fetch destination */
    public const string SEC_FETCH_DEST = 'Sec-Fetch-Dest';

    /** Fetch mode */
    public const string SEC_FETCH_MODE = 'Sec-Fetch-Mode';

    /** Fetch site relationship */
    public const string SEC_FETCH_SITE = 'Sec-Fetch-Site';

    /** Fetch user activation */
    public const string SEC_FETCH_USER = 'Sec-Fetch-User';


    /**
     * Private constructor - static class only
     */
    private function __construct() {}

    /**
     * Check if header is a request header
     */
    public static function isRequestHeader(string $header): bool
    {
        return in_array($header, self::getRequestHeaders(), true);
    }

    /**
     * Check if header is a response header
     */
    public static function isResponseHeader(string $header): bool
    {
        return in_array($header, self::getResponseHeaders(), true);
    }

    /**
     * Returns list of common request headers
     *
     * @return list<string>
     */
    public static function getRequestHeaders(): array
    {
        return [
            self::ACCEPT,
            self::ACCEPT_CHARSET,
            self::ACCEPT_ENCODING,
            self::ACCEPT_LANGUAGE,
            self::AUTHORIZATION,
            self::CACHE_CONTROL,
            self::CONNECTION,
            self::COOKIE,
            self::CONTENT_LENGTH,
            self::CONTENT_TYPE,
            self::EXPECT,
            self::FORWARDED,
            self::FROM,
            self::HOST,
            self::IF_MATCH,
            self::IF_MODIFIED_SINCE,
            self::IF_NONE_MATCH,
            self::IF_RANGE,
            self::IF_UNMODIFIED_SINCE,
            self::ORIGIN,
            self::PRAGMA,
            self::PROXY_AUTHORIZATION,
            self::RANGE,
            self::REFERER,
            self::TE,
            self::UPGRADE,
            self::USER_AGENT,
            self::X_FORWARDED_FOR,
            self::X_FORWARDED_HOST,
            self::X_FORWARDED_PROTO,
            self::X_REQUEST_ID,
        ];
    }

    /**
     * Returns list of common response headers
     *
     * @return list<string>
     */
    public static function getResponseHeaders(): array
    {
        return [
            self::ACCEPT_RANGES,
            self::ACCESS_CONTROL_ALLOW_CREDENTIALS,
            self::ACCESS_CONTROL_ALLOW_HEADERS,
            self::ACCESS_CONTROL_ALLOW_METHODS,
            self::ACCESS_CONTROL_ALLOW_ORIGIN,
            self::ACCESS_CONTROL_EXPOSE_HEADERS,
            self::ACCESS_CONTROL_MAX_AGE,
            self::AGE,
            self::ALLOW,
            self::CACHE_CONTROL,
            self::CONNECTION,
            self::CONTENT_DISPOSITION,
            self::CONTENT_ENCODING,
            self::CONTENT_LANGUAGE,
            self::CONTENT_LENGTH,
            self::CONTENT_LOCATION,
            self::CONTENT_RANGE,
            self::CONTENT_TYPE,
            self::DATE,
            self::ETAG,
            self::EXPIRES,
            self::LAST_MODIFIED,
            self::LINK,
            self::LOCATION,
            self::PRAGMA,
            self::RETRY_AFTER,
            self::SERVER,
            self::SET_COOKIE,
            self::STRICT_TRANSPORT_SECURITY,
            self::TRANSFER_ENCODING,
            self::VARY,
            self::WWW_AUTHENTICATE,
            self::X_CONTENT_TYPE_OPTIONS,
            self::X_FRAME_OPTIONS,
        ];
    }

    /**
     * Returns list of security-related headers
     *
     * @return list<string>
     */
    public static function getSecurityHeaders(): array
    {
        return [
            self::CONTENT_SECURITY_POLICY,
            self::CONTENT_SECURITY_POLICY_REPORT_ONLY,
            self::CROSS_ORIGIN_EMBEDDER_POLICY,
            self::CROSS_ORIGIN_OPENER_POLICY,
            self::CROSS_ORIGIN_RESOURCE_POLICY,
            self::PERMISSIONS_POLICY,
            self::REFERRER_POLICY,
            self::STRICT_TRANSPORT_SECURITY,
            self::X_CONTENT_TYPE_OPTIONS,
            self::X_DNS_PREFETCH_CONTROL,
            self::X_DOWNLOAD_OPTIONS,
            self::X_FRAME_OPTIONS,
            self::X_XSS_PROTECTION,
        ];
    }

    /**
     * Returns list of caching-related headers
     *
     * @return list<string>
     */
    public static function getCachingHeaders(): array
    {
        return [
            self::AGE,
            self::CACHE_CONTROL,
            self::ETAG,
            self::EXPIRES,
            self::IF_MATCH,
            self::IF_MODIFIED_SINCE,
            self::IF_NONE_MATCH,
            self::IF_UNMODIFIED_SINCE,
            self::LAST_MODIFIED,
            self::PRAGMA,
            self::VARY,
        ];
    }

    /**
     * Returns list of CORS-related headers
     *
     * @return list<string>
     */
    public static function getCorsHeaders(): array
    {
        return [
            self::ACCESS_CONTROL_ALLOW_CREDENTIALS,
            self::ACCESS_CONTROL_ALLOW_HEADERS,
            self::ACCESS_CONTROL_ALLOW_METHODS,
            self::ACCESS_CONTROL_ALLOW_ORIGIN,
            self::ACCESS_CONTROL_EXPOSE_HEADERS,
            self::ACCESS_CONTROL_MAX_AGE,
            self::ACCESS_CONTROL_REQUEST_HEADERS,
            self::ACCESS_CONTROL_REQUEST_METHOD,
            self::ORIGIN,
        ];
    }
}
