<?php
namespace Auth\Tests\API\Authentication;

use Upbond\Auth\SDK\API\Authentication;
use Auth\Tests\MockApi;

/**
 * Class MockAuthenticationApi
 *
 * @package Auth\Tests\API\Authentication
 */
class MockAuthenticationApi extends MockApi
{

    /**
     * @var Authentication
     */
    protected $client;

    /**
     * @param array $guzzleOptions
     * @param array $config
     */
    public function setClient(array $guzzleOptions, array $config = [])
    {
        $this->client = new Authentication(
            'test-domain.auth0.com',
            '__test_client_id__',
            '__test_client_secret__',
            null,
            null,
            $guzzleOptions
        );
    }
}
