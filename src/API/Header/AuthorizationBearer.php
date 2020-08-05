<?php
namespace Upbond\Auth\SDK\API\Header;

class AuthorizationBearer extends Header
{

    /**
     * AuthorizationBearer constructor.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        parent::__construct('Authorization', "Bearer $token");
    }
}
