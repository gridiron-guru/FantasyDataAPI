<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Mock\Timeframes;

use FantasyDataAPI\Enum\Format;
use FantasyDataAPI\Enum\Subscription;
use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Test\Mock\Client;

use FantasyDataAPI\Enum\Timeframes\Type;
use FantasyDataAPI\Enum\Timeframes\Property;

class MockTest extends PHPUnit_Framework_TestCase
{
    /**
     * Given: A developer API key
     * When: API is queried for current Timeframe
     * Then: Expect that the api key is placed in the URL as expected by the service
     *
     * Expect a service URL something like this:
     *   http://api.nfldata.apiphany.com/developer/json/Timeframes/current?key=093adab5-d62b-4342-9b0b-cd0b08948110
     */
    public function testAPIKeyParameter()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);
//         $client = new \FantasyDataAPI\Test\DebugClient($_SERVER['FANTASY_DATA_API_KEY'], 'developer');

        /** \GuzzleHttp\Command\Model */
        $client->Timeframes(['Type' => Type::KEY_CURRENT]);

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
     * When: API is queried for current Timeframe
     * Then: Expect that the proper subscription type is placed in the URI
     */
    public function testSubscriptionInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** \GuzzleHttp\Command\Model */
        $client->Timeframes(['Type' => Type::KEY_CURRENT]);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 3 should be the "subscription type" based on URL structure */
        $this->assertArrayHasKey(3, $pieces);
        $this->assertEquals( $pieces[3], Subscription::KEY_DEVELOPER);
    }

    /**
     * Given: A developer API key
     * When: API is queried for current Timeframe
     * Then: Expect that the proper format is placed in the URI
     */
    public function testFormatInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER, Format::KEY_JSON);

        /** \GuzzleHttp\Command\Model */
        $client->Timeframes(['Type' => Type::KEY_CURRENT]);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 4 should be the "format" based on URL structure */
        $this->assertArrayHasKey(4, $pieces);
        $this->assertEquals( $pieces[4], Format::KEY_JSON);
    }

    /**
     * Given: A developer API key
     * When: API is queried for current Timeframe
     * Then: Expect that the Timeframe resource is placed in the URI
     */
    public function testResourceInURI()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER, Format::KEY_JSON);

        /** \GuzzleHttp\Command\Model */
        $client->Timeframes(['Type' => Type::KEY_CURRENT]);

        $response = $client->mHistory->getLastResponse();
        $effective_url = $response->getEffectiveUrl();

        $pieces = explode('/', $effective_url);

        /** key 5 should be the "resource" based on URL structure */
        $this->assertArrayHasKey(5, $pieces);
        $this->assertEquals( $pieces[5], 'Timeframes');
    }

    /**
     * Given: A developer API key
     * When: API is queried for current Timeframe
     * Then: Expect a 200 response with an array of 1 entry, that entry containing 16 keys
     */
    public function testCurrentTimeframeSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Timeframes(['Type' => Type::KEY_CURRENT]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we only expect a single response from 'current' */
        $this->assertCount( 1, $result );

        /** test the contents of the response to make sure it has what we expect */
        $current = $result->toArray()[0];

        /** we expect 16 keys */
        $this->assertCount( 16, $current );

        /** test all the keys */
        $this->assertArrayHasKey( Property::KEY_END_DATA, $current );
        $this->assertArrayHasKey( Property::KEY_FIRST_GAME_END, $current );
        $this->assertArrayHasKey( Property::KEY_FIRST_GAME_START, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_STARTED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_GAMES, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_STARTED, $current );
        $this->assertArrayHasKey( Property::KEY_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_NAME, $current );
        $this->assertArrayHasKey( Property::KEY_SEASON, $current );
        $this->assertArrayHasKey( Property::KEY_SEASON_TYPE, $current );
        $this->assertArrayHasKey( Property::KEY_SHORT_NAME, $current );
        $this->assertArrayHasKey( Property::KEY_START_DATE, $current );
        $this->assertArrayHasKey( Property::KEY_WEEK, $current );
    }

    /**
     * Given: A developer API key
     * When: API is queried for completed Timeframe
     * Then: Expect a 200 response with an array of 1 entry, that entry containing 16 keys
     */
    public function testCompletedTimeframeSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Timeframes(['Type' => Type::KEY_COMPLETED]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we only expect a single response from 'current' */
        $this->assertCount( 1, $result );

        /** test the contents of the response to make sure it has what we expect */
        $current = $result->toArray()[0];

        /** we expect 16 keys */
        $this->assertCount( 16, $current );

        /** test all the keys */
        $this->assertArrayHasKey( Property::KEY_END_DATA, $current );
        $this->assertArrayHasKey( Property::KEY_FIRST_GAME_END, $current );
        $this->assertArrayHasKey( Property::KEY_FIRST_GAME_START, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_STARTED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_GAMES, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_STARTED, $current );
        $this->assertArrayHasKey( Property::KEY_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_NAME, $current );
        $this->assertArrayHasKey( Property::KEY_SEASON, $current );
        $this->assertArrayHasKey( Property::KEY_SEASON_TYPE, $current );
        $this->assertArrayHasKey( Property::KEY_SHORT_NAME, $current );
        $this->assertArrayHasKey( Property::KEY_START_DATE, $current );
        $this->assertArrayHasKey( Property::KEY_WEEK, $current );
    }

    /**
     * Given: A developer API key
     * When: API is queried for upcoming Timeframe
     * Then: Expect a 200 response with an array of 1 entry, that entry containing 16 keys
     */
    public function testUpcomingTimeframeSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Timeframes(['Type' => Type::KEY_UPCOMING]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we only expect a single response from 'current' */
        $this->assertCount( 1, $result );

        /** test the contents of the response to make sure it has what we expect */
        $current = $result->toArray()[0];

        /** we expect 16 keys */
        $this->assertCount( 16, $current );

        /** test all the keys */
        $this->assertArrayHasKey( Property::KEY_END_DATA, $current );
        $this->assertArrayHasKey( Property::KEY_FIRST_GAME_END, $current );
        $this->assertArrayHasKey( Property::KEY_FIRST_GAME_START, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_STARTED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_GAMES, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_HAS_STARTED, $current );
        $this->assertArrayHasKey( Property::KEY_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Property::KEY_NAME, $current );
        $this->assertArrayHasKey( Property::KEY_SEASON, $current );
        $this->assertArrayHasKey( Property::KEY_SEASON_TYPE, $current );
        $this->assertArrayHasKey( Property::KEY_SHORT_NAME, $current );
        $this->assertArrayHasKey( Property::KEY_START_DATE, $current );
        $this->assertArrayHasKey( Property::KEY_WEEK, $current );
    }

    /**
     * Given: A developer API key
     * When: API is queried for recent Timeframe
     * Then: Expect a 200 response with ...
     */
    public function testRecentTimeframeSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Timeframes(['Type' => Type::KEY_RECENT]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_keys = function ( $pCurrent )
        {
            /** we expect 16 keys */
            $this->assertCount( 16, $pCurrent );

            /** test all the keys */
            $this->assertArrayHasKey( Property::KEY_END_DATA, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_FIRST_GAME_END, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_FIRST_GAME_START, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_ENDED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_ENDED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_STARTED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_GAMES, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_LAST_GAME_ENDED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_STARTED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_LAST_GAME_ENDED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_NAME, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_SEASON, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_SEASON_TYPE, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_SHORT_NAME, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_START_DATE, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_WEEK, $pCurrent );
        };

        $timeframes = $result->toArray();

        array_walk( $timeframes, $check_keys );
    }

    /**
     * Given: A developer API key
     * When: API is queried for all Timeframes
     * Then: Expect a 200 response with ...
     */
    public function testAllTimeframeSuccessfulResponse()
    {
        $client = new Client($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Timeframes(['Type' => Type::KEY_ALL]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_keys = function ( $pCurrent )
        {
            /** we expect 16 keys */
            $this->assertCount( 16, $pCurrent );

            /** test all the keys */
            $this->assertArrayHasKey( Property::KEY_END_DATA, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_FIRST_GAME_END, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_FIRST_GAME_START, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_ENDED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_ENDED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_FIRST_GAME_STARTED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_GAMES, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_LAST_GAME_ENDED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_HAS_STARTED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_LAST_GAME_ENDED, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_NAME, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_SEASON, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_SEASON_TYPE, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_SHORT_NAME, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_START_DATE, $pCurrent );
            $this->assertArrayHasKey( Property::KEY_WEEK, $pCurrent );
        };

        $timeframes = $result->toArray();

        array_walk( $timeframes, $check_keys );
    }

}
