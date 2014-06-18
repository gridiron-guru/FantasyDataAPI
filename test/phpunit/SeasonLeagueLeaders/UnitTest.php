<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\SeasonLeagueLeaders;

use FantasyDataAPI\Enum\Subscription;
use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\Mock\Client;

class UnitTest extends PHPUnit_Framework_TestCase
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
     *   http://api.nfldata.apiphany.com/developer/json/SeasonLeagueLeaders/2013REG/NE?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

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
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
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
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
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
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the json format is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testFormatInURI()
    {
        /** key 4 should be the "format" based on URL structure */
        $this->assertArrayHasKey(4, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[4], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the SeasonLeagueLeaders resource is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testResourceInURI()
    {
        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(5, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[5], 'SeasonLeagueLeaders');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Season is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testSeasonInURI()
    {
        /** key 6 should be the Season based on URL structure */
        $this->assertArrayHasKey(6, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[6], '2013REG');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Position is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testPositionInURI()
    {
        /** key 7 should be the Team based on URL structure */
        $this->assertArrayHasKey(7, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[7], 'WR');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Column is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testColumnInURI()
    {
        /** key 8 should be the Team based on URL structure */
        $this->assertArrayHasKey(8, static::$sUrlFragments);

        list($column) = explode('?', static::$sUrlFragments[8]);
        $this->assertEquals( $column, 'FantasyPoints');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect a 200 response with an array of player game stats
     *
     * @group Unit
     * @small
     */
    public function testSuccessfulResponse()
    {
        $this->assertEquals('200', static::$sResponse->getStatusCode());
    }

}
