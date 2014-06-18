<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\News;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Enum\Subscription;
use FantasyDataAPI\Test\Mock\Client;

/** our resource enums for this test */
use FantasyDataAPI\Enum\PlayerNews;

class MockTest extends PHPUnit_Framework_TestCase
{
    /** @var Client */
    protected static $sClient;

    /** @var \GuzzleHttp\Message\Response */
    protected static $sResponse;

    protected static $sEffectiveUrl;
    protected static $sUrlFragments;

    /**
     * Set up our test fixture.
     *
     * Expect a service URL something like this:
     *   http://api.nfldata.apiphany.com/developer/json/Byes/2014REG?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->Byes(['Season' => '2014REG']);

        static::$sResponse = static::$sClient->mHistory->getLastResponse();
        static::$sEffectiveUrl = static::$sResponse->getEffectiveUrl();
        static::$sUrlFragments = explode('/', static::$sEffectiveUrl);
    }

    public static function tearDownAfterClass()
    {
        static::$sClient = null;
        static::$sResponse = null;
        static::$sEffectiveUrl = null;
        static::$sUrlFragments = null;
    }

    /**
     * Given: A developer API key
     * When: API is queried for News
     * Then: Expect that the api key is placed in the URL as expected by the service
     *
     * @group Unit
     *
     * Expect a service URL something like this:
     *   http://api.nfldata.apiphany.com/developer/json/News?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public function testAPIKeyParameter()
    {
        $matches = [];

        /**
         * not the most elegant way to test for the query parameter, but it's not real easy
         * to get at them with the method i'm using. Not sure if there's a better method or
         * not. If you happen to look at this and know a better way to get query params etc.
         * from Guzzle, let me know.
         */
        $pattern = '/key=' . $_SERVER['FANTASY_DATA_API_KEY'] . '/';
        preg_match($pattern, static::$sEffectiveUrl, $matches);

        $this->assertNotEmpty($matches);
    }

    /**
     * Given: A developer API key
     * When: API is queried for News
     * Then: Expect that the proper subscription type is placed in the URI
     *
     * @group Unit
     */
    public function testSubscriptionInURI()
    {
        /** key 3 should be the "subscription type" based on URL structure */
        $this->assertArrayHasKey(3, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[3], Subscription::KEY_DEVELOPER);
    }

    /**
     * Given: A developer API key
     * When: API is queried for News
     * Then: Expect that the json format is placed in the URI
     *
     * @group Unit
     */
    public function testFormatInURI()
    {
        /** key 4 should be the "format" based on URL structure */
        $this->assertArrayHasKey(4, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[4], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for News
     * Then: Expect that the News resource is placed in the URI
     *
     * @group Unit
     */
    public function testResourceInURI()
    {
        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(5, static::$sUrlFragments);

        list($resource) = explode('?', static::$sUrlFragments[5]);
        $this->assertEquals( $resource, 'News');
    }

    /**
     * Given: A developer API key
     * When: API is queried for News
     * Then: Expect a 200 response
     *
     * @group Unit
     */
    public function testSuccessfulResponse()
    {
        $this->assertEquals('200', static::$sResponse->getStatusCode());
    }
}
