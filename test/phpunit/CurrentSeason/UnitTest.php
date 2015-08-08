<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\CurrentSeason;

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
     *   http://api.nfldata.apiphany.com/developer/xml/CurrentSeason
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new MockClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->CurrentSeason([]);

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
     * When: API is queried for CurrentSeason
     * Then: Expect that the xml format is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testFormatInURI()
    {
        /** key 4 should be the "format" based on URL structure
            /nfl/v2/xml/CurrentSeason
         */
        $this->assertArrayHasKey(5, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[5], 'xml');
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
        /** key 6 should be the "resource" based on URL structure
        /nfl/v2/xml/CurrentSeason
         */
        $this->assertArrayHasKey(6, static::$sUrlFragments);

        /** the last piece in the array should be CurrentSeason so we need to snip that part off */
        list( $resource ) = explode( '?', static::$sUrlFragments[6] );

        $this->assertEquals($resource, 'CurrentSeason');
    }

    /**
     * Given: A developer API key
     * When: API is queried for CurrentSeason
     * Then: Expect a 200 response with an array of 1 entry, that entry containing the string true or false
     *
     * @group Unit
     * @small
     */
    public function testCurrentSeasonSuccessfulResponse()
    {
        $this->assertEquals('200', static::$sResponse->getStatusCode());
    }
}
