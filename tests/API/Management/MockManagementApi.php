<?php
namespace Auth\Tests\API\Management;

use Auth\Tests\MockApi;

use Upbond\Auth\SDK\API\Management;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

/**
 * Class MockManagementApi
 *
 * @package Auth\Tests\API\Management
 */
class MockManagementApi extends MockApi
{

    /**
     * Management API object.
     *
     * @var Management
     */
    protected $client;

    /**
     * @param array $guzzleOptions
     * @param array $config
     */
    public function setClient(array $guzzleOptions, array $config = [])
    {
        $returnType   = isset( $config['return_type'] ) ? $config['return_type'] : null;
        $this->client = new Management('__api_token__', 'api.test.local', $guzzleOptions, $returnType);
    }
}
