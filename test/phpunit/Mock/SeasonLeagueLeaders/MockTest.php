<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Mock\SeasonLeagueLeaders;

use FantasyDataAPI\Enum\Subscription;
use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\Mock\Client;

class MockTest extends PHPUnit_Framework_TestCase
{
    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the api key is placed in the URL as expected by the service
     *
     * Expect a service URL something like this:
     *   http://api.nfldata.apiphany.com/developer/json/SeasonLeagueLeaders/2013REG/NE?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public function testAPIKeyParameter()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);
//         $client = new \FantasyDataAPI\Test\DebugClient($_SERVER['FANTASY_DATA_API_KEY'], 'developer');

        /** \GuzzleHttp\Command\Model */
        $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $matches = [];

        /**
         * not the most elegant way to test for the query parameter, but it's not real easy
         * to get at them with the method i'm using. Not sure if there's a better method or
         * not. If you happen to look at this and know a better way to get query params etc.
         * from Guzzle, let me know.
         */
        $pattern = '/key=' . $_SERVER['FANTASY_DATA_API_KEY'] . '/';
        preg_match($pattern, $effective_url, $matches);

        $this->assertNotEmpty($matches);
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the proper subscription type is placed in the URI
     */
    public function testSubscriptionInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 3 should be the "subscription type" based on URL structure */
        $this->assertArrayHasKey(3, $pieces);
        $this->assertEquals( $pieces[3], Subscription::KEY_DEVELOPER);
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the json format is placed in the URI
     */
    public function testFormatInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 4 should be the "format" based on URL structure */
        $this->assertArrayHasKey(4, $pieces);
        $this->assertEquals( $pieces[4], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the TeamSeasonStats resource is placed in the URI
     */
    public function testResourceInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(5, $pieces);
        $this->assertEquals( $pieces[5], 'SeasonLeagueLeaders');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Season is placed in the URI
     */
    public function testSeasonInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 6 should be the Season based on URL structure */
        $this->assertArrayHasKey(6, $pieces);
        $this->assertEquals( $pieces[6], '2013REG');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Position is placed in the URI
     */
    public function testPositionInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 7 should be the Team based on URL structure */
        $this->assertArrayHasKey(7, $pieces);
        $this->assertEquals( $pieces[7], 'WR');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect that the Column is placed in the URI
     */
    public function testColumnInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 8 should be the Team based on URL structure */
        $this->assertArrayHasKey(8, $pieces);

        list($column) = explode('?', $pieces[8]);
        $this->assertEquals( $column, 'FantasyPoints');
    }

    /**
     * Given: A developer API key
     * When: API is queried for SeasonLeagueLeaders 2013REG, Position WR, Column FantasyPoints
     * Then: Expect a 200 response with an array of player game stats
     */
    public function testSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());
    }

}
