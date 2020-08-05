<?php

namespace Auth\Tests;

use Upbond\Auth\SDK\API\Header\AuthorizationBearer;
use Upbond\Auth\SDK\API\Header\ContentType;
use Upbond\Auth\SDK\API\Header\ForwardedFor;
use Upbond\Auth\SDK\API\Header\Header;
use Upbond\Auth\SDK\API\Header\Telemetry;
use PHPUnit\Framework\TestCase;

class HeaderTest extends TestCase
{

    public function testHeader()
    {
        $headerName = 'HEADERNAME';
        $value      = 'THISISTHEVALUE';

        $header = new Header($headerName, $value);

        $this->assertEquals($headerName, $header->getHeader());
        $this->assertEquals($value, $header->getValue());
        $this->assertEquals("$headerName: $value\n", $header->get());
    }

    public function testAuthorizationBearer()
    {
        $token  = 'THISISTHETOKEN';
        $header = new AuthorizationBearer($token);

        $this->assertEquals('Authorization', $header->getHeader());
        $this->assertEquals("Bearer $token", $header->getValue());
        $this->assertEquals("Authorization: Bearer $token\n", $header->get());
    }

    public function testContentType()
    {
        $contentType = 'CONTENT/TYPE';
        $header      = new ContentType($contentType);

        $this->assertEquals('Content-Type', $header->getHeader());
        $this->assertEquals($contentType, $header->getValue());
        $this->assertEquals("Content-Type: $contentType\n", $header->get());
    }

    public function testTelemetry()
    {
        $telemetryVal = uniqid();
        $header       = new Telemetry($telemetryVal);

        $this->assertEquals('Auth-Client', $header->getHeader());
        $this->assertEquals($telemetryVal, $header->getValue());
        $this->assertEquals("Auth-Client: $telemetryVal\n", $header->get());
    }

    public function testForwardedFor()
    {
        $forwardedForVal = uniqid();
        $header          = new ForwardedFor($forwardedForVal);

        $this->assertEquals('Auth-Forwarded-For', $header->getHeader());
        $this->assertEquals($forwardedForVal, $header->getValue());
        $this->assertEquals("Auth-Forwarded-For: $forwardedForVal\n", $header->get());
    }
}
