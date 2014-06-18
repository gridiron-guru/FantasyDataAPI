<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\AreAnyGamesInProgress;

use FantasyDataAPI\Enum\Subscription;
use PHPUnit_Framework_TestCase;

/** our resource enums for this test */
use FantasyDataAPI\Test\MockClient;

class UnitTest extends PHPUnit_Framework_TestCase
{
    /** @var MockClient */
    protected static $sClient;

    /** @var \GuzzleHttp\Message\Response */
    protected static $sResponse;

    protected static $sEffectiveUrl;
    protected static $sUrlFragments;

    /**
     * Set up our test fixture.
     *
     * Expect a service URL something like this:
     *   http://api.nfldata.apiphany.com/developer/xml/AreAnyGamesInProgress/?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new MockClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->AreAnyGamesInProgress([]);

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
     * When: API is queried for AreAnyGamesInProgress
     * Then: Expect that the api key is placed in the URL as expected by the service
     *
     * @group Unit
     * @small
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
     * When: API is queried for AreAnyGamesInProgress
     * Then: Expect that the proper subscription type is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testSubscriptionInURI()
    {
        /** key 3 should be the "subscription type" based on URL structure */
        $this->assertArrayHasKey(3, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[3], Subscription::KEY_DEVELOPER);
    }

    /**
     * Given: A developer API key
     * When: API is queried for AreAnyGamesInProgress
     * Then: Expect that the xml format is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testFormatInURI()
    {
        /** key 4 should be the "format" based on URL structure */
        $this->assertArrayHasKey(4, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[4], 'xml');
    }

    /**
     * Given: A developer API key
     * When: API is queried for AreAnyGamesInProgress
     * Then: Expect that the AreAnyGamesInProgress resource is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testResourceInURI()
    {
        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(5, static::$sUrlFragments);

        /** the last piece in the array should be AreAnyGamesInProgress?key=<key> so we need to snip that part off */
        list( $resource ) = explode( '?', static::$sUrlFragments[5] );

        $this->assertEquals($resource, 'AreAnyGamesInProgress');
    }

    /**
     * Given: A developer API key
     * When: API is queried for AreAnyGamesInProgress
     * Then: Expect a 200 response with an array of 1 entry, that entry containing the string true or false
     *
     * @group Unit
     * @small
     */
    public function testAreAnyGamesInProgressSuccessfulResponse()
    {
        $this->assertEquals('200', static::$sResponse->getStatusCode());
    }
}
