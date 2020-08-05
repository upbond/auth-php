<?php
namespace Upbond\Auth\SDK\API\Header;

class ContentType extends Header
{

    /**
     * ContentType constructor.
     *
     * @param string $contentType
     */
    public function __construct($contentType)
    {
        parent::__construct('Content-Type', $contentType);
    }
}
