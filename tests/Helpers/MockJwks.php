<?php
namespace Auth\Tests\Helpers;

use Upbond\Auth\SDK\Helpers\JWKFetcher;
use Auth\Tests\MockApi;
use Psr\SimpleCache\CacheInterface;


/**
 * Class MockJwks
 *
 * @package Upbond\Auth\SDK\Helpers\JWKFetcher
 */
class MockJwks extends MockApi
{

    /**
     * @var JWKFetcher
     */
    protected $client;

    /**
     * @param array $guzzleOptions
     * @param array $config
     */
    public function setClient(array $guzzleOptions, array $config = [])
    {
        $cache = isset( $config['cache'] ) && $config['cache'] instanceof CacheInterface ? $config['cache'] : null;
        $this->client = new JWKFetcher( $cache, $guzzleOptions );
    }
}
