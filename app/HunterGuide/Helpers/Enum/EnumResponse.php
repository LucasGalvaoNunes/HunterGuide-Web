<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 12/11/18
 * Time: 20:05
 */

namespace App\HunterGuide\Helpers\Enum;

use Nasyrov\Laravel\Enums\Enum;

class EnumResponse extends Enum
{
    const __default = self::RESPONSE_OK;

    // 2xx Status
    /**
     * Standard response for successful HTTP requests.
     * The actual response will depend on the request method used.
     * In a GET request, the response will contain an entity corresponding to the requested resource.
     * In a POST request, the response will contain an entity describing or containing the result of the action
     */
    const RESPONSE_OK = 200;
    /**
     * The request has been fulfilled, resulting in the creation of a new resource.
     */
    const RESPONSE_CREATED = 201;


    // 4xx Status Codes.
    /**
     * The server cannot or will not process the request due to an apparent client error
     * (e.g., malformed request syntax, size too large, invalid request message framing, or deceptive request routing)
     */
    const RESPONSE_BAD_REQUEST = 400;
    /**
     * Similar to 403 Forbidden, but specifically for use when authentication is required and has failed or
     * has not yet been provided. The response must include a WWW-Authenticate header field containing a challenge
     * applicable to the requested resource. See Basic access authentication and Digest access authentication.
     * Note: Some sites incorrectly issue HTTP 401 when an IP address is banned from the website (usually the website domain)
     * and that specific address is refused permission to access a website.
     *
     */
    const RESPONSE_UNAUTHORIZED = 401;
    /**
     * The request was valid, but the server is refusing action. The user might not have the necessary permissions for a resource,
     * or may need an account of some sort.
     */
    const RESPONSE_FORBIDDEN = 403;
    /**
     * The requested resource could not be found but may be available in the future. Subsequent requests by the client are permissible.
     */
    const RESPONSE_NOT_FOUND = 404;
    /**
     * A request method is not supported for the requested resource; for example,
     * a GET request on a form that requires data to be presented via POST, or a PUT request on a read-only resource.
     */
    const RESPONSE_METHOD_NOT_ALLOWED = 405;

    // 5xx Status Codes
    /**
     * A generic error message, given when an unexpected condition was encountered and no more specific message is suitable
     */
    const RESPONSE_INTERNAL_ERROR = 500;
}