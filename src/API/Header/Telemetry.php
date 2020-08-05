<?php
namespace Upbond\Auth\SDK\API\Header;

class Telemetry extends Header
{

    /**
     * Telemetry constructor.
     *
     * @param string $telemetryData
     */
    public function __construct($telemetryData)
    {
        parent::__construct('Auth-Client', $telemetryData);
    }
}
