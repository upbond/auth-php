<?php
namespace Auth\Tests\API\Management;

use Upbond\Auth\SDK\API\Helpers\InformationHeaders;
use Upbond\Auth\SDK\API\Management;
use Auth\Tests\API\ApiTests;
use Auth\Tests\Traits\ErrorHelpers;
use GuzzleHttp\Psr7\Response;

/**
 * Class GuardianTest.
 *
 * @package Auth\Tests\API\Management
 */
class GuardianTest extends ApiTests
{

    use ErrorHelpers;

    /**
     * Expected telemetry value.
     *
     * @var string
     */
    protected static $telemetry;

    /**
     * Runs before test suite starts.
     */
    public static function setUpBeforeClass()
    {
        $infoHeadersData = new InformationHeaders;
        $infoHeadersData->setCorePackage();
        self::$telemetry = $infoHeadersData->build();
    }

    /**
     * Test that getFactors requests properly.
     *
     * @return void
     *
     * @throws \Exception Should not be thrown in this test.
     */
    public function testGuardianGetFactor()
    {
        $api = new MockManagementApi( [ new Response( 200 ) ] );

        $api->call()->guardian()->getFactors();

        $this->assertEquals( 'GET', $api->getHistoryMethod() );
        $this->assertEquals( 'https://api.test.local/api/v2/guardian/factors', $api->getHistoryUrl() );
        $this->assertEmpty( $api->getHistoryQuery() );

        $headers = $api->getHistoryHeaders();
        $this->assertEquals( 'Bearer __api_token__', $headers['Authorization'][0] );
        $this->assertEquals( self::$telemetry, $headers['Auth-Client'][0] );
    }

    /**
     * Test that getEnrollment requests properly.
     *
     * @return void
     *
     * @throws \Exception Should not be thrown in this test.
     */
    public function testGuardianGetEnrollment()
    {
        $api = new MockManagementApi( [ new Response( 200 ) ] );

        $api->call()->guardian()->getEnrollment('__test_factor_id__');

        $this->assertEquals( 'GET', $api->getHistoryMethod() );
        $this->assertEquals(
            'https://api.test.local/api/v2/guardian/enrollments/__test_factor_id__',
            $api->getHistoryUrl()
        );
        $this->assertEmpty( $api->getHistoryQuery() );

        $headers = $api->getHistoryHeaders();
        $this->assertEquals( 'Bearer __api_token__', $headers['Authorization'][0] );
        $this->assertEquals( self::$telemetry, $headers['Auth-Client'][0] );
    }

    /**
     * Test that deleteEnrollment requests properly.
     *
     * @return void
     *
     * @throws \Exception Should not be thrown in this test.
     */
    public function testGuardianDeleteEnrollment()
    {
        $api = new MockManagementApi( [ new Response( 200 ) ] );

        $api->call()->guardian()->deleteEnrollment('__test_factor_id__');

        $this->assertEquals( 'DELETE', $api->getHistoryMethod() );
        $this->assertEquals(
            'https://api.test.local/api/v2/guardian/enrollments/__test_factor_id__',
            $api->getHistoryUrl()
        );
        $this->assertEmpty( $api->getHistoryQuery() );

        $headers = $api->getHistoryHeaders();
        $this->assertEquals( 'Bearer __api_token__', $headers['Authorization'][0] );
        $this->assertEquals( self::$telemetry, $headers['Auth-Client'][0] );
    }

    /**
     * Test that getFactors requests properly.
     *
     * @return void
     *
     * @throws \Exception Should not be thrown in this test.
     */
    public function testIntegrationGuardianGetFactor()
    {
        $env = self::getEnv();

        if (! $env['API_TOKEN']) {
            $this->markTestSkipped( 'No client secret; integration test skipped' );
        }

        $api = new Management($env['API_TOKEN'], $env['DOMAIN']);
        $factors = $api->guardian()->getFactors();

        $this->assertIsArray($factors);
        $this->assertNotEmpty($factors);
    }
}
