<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Injuries;

use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\MockClient;

use FantasyDataAPI\Enum\Score;
use FantasyDataAPI\Enum\Stadium;

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
     *   http://api.nfldata.apiphany.com/developer/json/Injuries/2013REG?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public static function setUpBeforeClass()
    {
        static::$sClient = new MockClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** \GuzzleHttp\Command\Model */
        static::$sClient->Injuries(['Season' => '2013REG', 'Week' => '17']);

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
     * When: API is queried for 2013REG Injuries
     * Then: Expect that the json format is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testFormatInURI()
    {
        /** key 5 should be the "format" based on URL structure */
        $this->assertArrayHasKey(5, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[5], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Injuries
     * Then: Expect that the Injuries resource is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testResourceInURI()
    {
        /** key 6 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(6, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[6], 'Injuries');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Injuries, Week 17
     * Then: Expect that the Season is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testSeasonInURI()
    {
        /** key 7 should be the Season based on URL structure */
        $this->assertArrayHasKey(7, static::$sUrlFragments);
        $this->assertEquals( static::$sUrlFragments[7], '2013REG');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Injuries, Week 17
     * Then: Expect that the Week is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testWeekInURI()
    {
        /** key 8 should be the Week based on URL structure */
        $this->assertArrayHasKey(8, static::$sUrlFragments);

        list($week) = explode('?', static::$sUrlFragments[8]);
        $this->assertEquals( $week, '17');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Injuries, Week 17, NE (optional team parameter)
     * Then: Expect that the Team is placed in the URI
     *
     * @group Unit
     * @small
     */
    public function testTeamInURI()
    {
        /** this resource has alternate options, so not using the class setup to test them */

        $client = new MockClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** \GuzzleHttp\Command\Model */
        $client->Injuries(['Season' => '2013REG', 'Week' => '17', 'Team' => 'NE']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();
        $url_fragments = explode('/', $effective_url);

        /** key 9 should be the Week based on URL structure */
        $this->assertArrayHasKey(9, $url_fragments);

        list($team) = explode('?', $url_fragments[9]);
        $this->assertEquals( $team, 'NE');

        $client = NULL;
        $response = NULL;
        $effective_url = NULL;
        $url_fragments = NULL;
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Injuries
     * Then: Expect a 200 response with an array of Injuries, each containing a stadium
     *
     * @group Unit
     * @small
     */
    public function testSuccessfulResponse()
    {
        $this->assertEquals('200', static::$sResponse->getStatusCode());
    }
}
