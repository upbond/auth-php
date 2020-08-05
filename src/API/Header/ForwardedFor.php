<?php
namespace Upbond\Auth\SDK\API\Header;

class ForwardedFor extends Header
{

    /**
     * ForwardedFor constructor.
     *
     * @param string $ipAddress
     */
    public function __construct($ipAddress)
    {
        parent::__construct('Auth-Forwarded-For', $ipAddress);
    }
}
