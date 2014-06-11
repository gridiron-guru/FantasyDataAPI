<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Mock\Schedules;

use FantasyDataAPI\Enum\Subscription;
use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\Mock\Client;

use FantasyDataAPI\Enum\Schedule;
use FantasyDataAPI\Enum\Stadium;

class MockTest extends PHPUnit_Framework_TestCase
{
    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Schedules
     * Then: Expect that the api key is placed in the URL as expected by the service
     *
     * Expect a service URL something like this:
     *   http://api.nfldata.apiphany.com/developer/json/Schedules/2014REG?key=000aaaa0-a00a-0000-0a0a-aa0a00000000
     */
    public function testAPIKeyParameter()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);
//         $client = new \FantasyDataAPI\Test\DebugClient($_SERVER['FANTASY_DATA_API_KEY'], 'developer');

        /** \GuzzleHttp\Command\Model */
        $client->Schedules(['Season' => '2014REG']);

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
     * When: API is queried for 2014REG Schedules
     * Then: Expect that the proper subscription type is placed in the URI
     */
    public function testSubscriptionInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Schedules(['Season' => '2014REG']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 3 should be the "subscription type" based on URL structure */
        $this->assertArrayHasKey(3, $pieces);
        $this->assertEquals( $pieces[3], Subscription::KEY_DEVELOPER);
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Schedules
     * Then: Expect that the json format is placed in the URI
     */
    public function testFormatInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Schedules(['Season' => '2014REG']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 4 should be the "format" based on URL structure */
        $this->assertArrayHasKey(4, $pieces);
        $this->assertEquals( $pieces[4], 'json');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Schedules
     * Then: Expect that the Schedules resource is placed in the URI
     */
    public function testResourceInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Schedules(['Season' => '2014REG']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(5, $pieces);
        $this->assertEquals( $pieces[5], 'Schedules');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Schedules
     * Then: Expect that the Season is placed in the URI
     */
    public function testSeasonInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Schedules(['Season' => '2014REG']);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 6 should be the Season based on URL structure */
        $this->assertArrayHasKey(6, $pieces);

        list($season) = explode('?', $pieces[6]);
        $this->assertEquals( $season, '2014REG');
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Schedules
     * Then: Expect a 200 response with an array of teams, each containing a stadium
     */
    public function test2014REGSchedulesSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Schedules(['Season' => '2014REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P Schedules for 2014REG */
        $this->assertNotCount( 0, $result );

        $check_team_keys = function ( $pSchedule )
        {
            /** we expect 12 keys */
            $this->assertCount( 12, $pSchedule );

            /** test all the keys */
            $this->assertArrayHasKey( Schedule\Property::KEY_AWAY_TEAM, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_CHANNEL, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_DATE, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_GAME_KEY, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_HOME_TEAM, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_OVER_UNDER, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_POINT_SPREAD, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_SEASON, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_SEASON_TYPE, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_STADIUM_DETAILS, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_STADIUM_ID, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_WEEK, $pSchedule );

            if ( 'BYE' != $pSchedule[Schedule\Property::KEY_AWAY_TEAM] )
            {
                /** we expect 7 keys */
                $this->assertCount( 7, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );

                /** test all the properties */
                $this->assertArrayHasKey( Stadium\Property::KEY_CAPACITY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_CITY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_COUNTRY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_NAME, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_PLAYING_SURFACE, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_STADIUM_ID, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_STATE, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
            }
        };

        $schedules = $result->toArray();

        array_walk( $schedules, $check_team_keys );
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2014PRE Schedules
     * Then: Expect a 200 response with an array of teams, each containing a stadium
     */
    public function test2014PRESchedulesSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Schedules(['Season' => '2014PRE']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P Schedules for 2014PRE */
        $this->assertNotCount( 0, $result );

        $check_team_keys = function ( $pSchedule )
        {
            /** we expect 12 keys */
            $this->assertCount( 12, $pSchedule );

            /** test all the keys */
            $this->assertArrayHasKey( Schedule\Property::KEY_AWAY_TEAM, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_CHANNEL, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_DATE, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_GAME_KEY, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_HOME_TEAM, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_OVER_UNDER, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_POINT_SPREAD, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_SEASON, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_SEASON_TYPE, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_STADIUM_DETAILS, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_STADIUM_ID, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_WEEK, $pSchedule );

            if ( 'BYE' != $pSchedule[Schedule\Property::KEY_AWAY_TEAM] )
            {
                /** we expect 7 keys */
                $this->assertCount( 7, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );

                /** test all the properties */
                $this->assertArrayHasKey( Stadium\Property::KEY_CAPACITY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_CITY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_COUNTRY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_NAME, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_PLAYING_SURFACE, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_STADIUM_ID, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_STATE, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
            }
        };

        $schedules = $result->toArray();

        array_walk( $schedules, $check_team_keys );
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013POST Schedules
     * Then: Expect a 200 response with an array of teams, each containing a stadium
     */
    public function test2013POSTSchedulesSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Schedules(['Season' => '2013POST']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P Schedules for 2013POST */
        $this->assertNotCount( 0, $result );

        $check_team_keys = function ( $pSchedule )
        {
            /** we expect 12 keys */
            $this->assertCount( 12, $pSchedule );

            /** test all the keys */
            $this->assertArrayHasKey( Schedule\Property::KEY_AWAY_TEAM, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_CHANNEL, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_DATE, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_GAME_KEY, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_HOME_TEAM, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_OVER_UNDER, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_POINT_SPREAD, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_SEASON, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_SEASON_TYPE, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_STADIUM_DETAILS, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_STADIUM_ID, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_WEEK, $pSchedule );

            if ( 'BYE' != $pSchedule[Schedule\Property::KEY_AWAY_TEAM] )
            {
                /** we expect 7 keys */
                $this->assertCount( 7, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );

                /** test all the properties */
                $this->assertArrayHasKey( Stadium\Property::KEY_CAPACITY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_CITY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_COUNTRY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_NAME, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_PLAYING_SURFACE, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_STADIUM_ID, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_STATE, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
            }
        };

        $schedules = $result->toArray();

        array_walk( $schedules, $check_team_keys );
    }
}
