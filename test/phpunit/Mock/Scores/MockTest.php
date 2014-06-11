<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Mock\Scores;

use FantasyDataAPI\Enum\Subscription;
use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\Mock\Client;

use FantasyDataAPI\Enum\Score;
use FantasyDataAPI\Enum\Stadium;

class MockTest extends PHPUnit_Framework_TestCase
{
    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Scores
     * Then: Expect that the api key is placed in the URL as expected by the service
     *
     * Expect a service URL something like this:
     *   http://api.nfldata.apiphany.com/developer/json/Scores/2013REG?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public function testAPIKeyParameter()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);
//         $client = new \FantasyDataAPI\Test\DebugClient($_SERVER['FANTASY_DATA_API_KEY'], 'developer');

        /** \GuzzleHttp\Command\Model */
        $client->Scores(['Season' => '2013REG']);

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
     * When: API is queried for 2013REG Scores
     * Then: Expect that the proper subscription type is placed in the URI
     */
    public function testSubscriptionInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Scores(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 3 should be the "subscription type" based on URL structure */
        $this->assertArrayHasKey(3, $pieces);
        $this->assertEquals( $pieces[3], Subscription::KEY_DEVELOPER);
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Scores
     * Then: Expect that the json format is placed in the URI
     */
    public function testFormatInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Scores(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 4 should be the "format" based on URL structure */
        $this->assertArrayHasKey(4, $pieces);
        $this->assertEquals( $pieces[4], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Scores
     * Then: Expect that the Scores resource is placed in the URI
     */
    public function testResourceInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Scores(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(5, $pieces);
        $this->assertEquals( $pieces[5], 'Scores');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Scores
     * Then: Expect that the Season is placed in the URI
     */
    public function testSeasonInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Scores(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 6 should be the Season based on URL structure */
        $this->assertArrayHasKey(6, $pieces);

        list($season) = explode('?', $pieces[6]);
        $this->assertEquals( $season, '2013REG');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG Scores
     * Then: Expect a 200 response with an array of scores, each containing a stadium
     */
    public function test2013REGScoresSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Scores(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P Scores for 2013 */
        $this->assertNotCount( 0, $result );

        $check_score_keys = function ( $pScore )
        {
            /** we expect 12 keys */
            $this->assertCount( 43, $pScore );

            /** test all the keys */
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_OVERTIME, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_QUARTER_1ST, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_QUARTER_2ND, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_QUARTER_3RD, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_QUARTER_4TH, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_TEAM, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_CHANNEL, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_DATE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_DISTANCE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_DOWN, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_DOWN_AND_DISTANCE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_GAME_KEY, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_1ST_QUARTER_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_2ND_QUARTER_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_3RD_QUARTER_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_4TH_QUARTER_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_OVERTIME, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_QUARTER_1ST, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_QUARTER_2ND, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_QUARTER_3RD, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_QUARTER_4TH, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_TEAM, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_IS_IN_PROGRESS, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_IS_OVER, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_IS_OVERTIME, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_LAST_UPDATED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_OVER_UNDER, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_POINT_SPREAD, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_POSSESSION, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_QUARTER, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_QUARTER_DESCRIPTION, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_RED_ZONE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_SEASON, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_SEASON_TYPE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_STADIUM_DETAILS, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_STADIUM_ID, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_TIME_REMAINING, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_WEEK, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_YARD_LINE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_YARD_LINE_TERRITORY, $pScore );

            /** we expect 7 keys */
            $this->assertCount( 7, $pScore[Score\Property::KEY_STADIUM_DETAILS] );

            /** test all the properties */
            $this->assertArrayHasKey( Stadium\Property::KEY_CAPACITY, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_CITY, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_COUNTRY, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_NAME, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_PLAYING_SURFACE, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_STADIUM_ID, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_STATE, $pScore[Score\Property::KEY_STADIUM_DETAILS] );

        };

        $schedules = $result->toArray();

        array_walk( $schedules, $check_score_keys );
    }
}
