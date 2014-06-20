<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Timeframes;

use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Enum\Timeframes;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for current Timeframe
     * Then: Expect a 200 response with an array of 1 entry, that entry containing 16 keys
     *
     * @group Integration
     * @medium
     */
    public function testCurrentTimeframeSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Timeframes(['Type' => Timeframes\Type::KEY_CURRENT]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we only expect a single response from 'current' */
        $this->assertCount( 1, $result );

        /** test the contents of the response to make sure it has what we expect */
        $current = $result->toArray()[0];

        /** we expect 16 keys */
        $this->assertCount( 16, $current );

        /** test all the keys */
        $this->assertArrayHasKey( Timeframes\Property::KEY_END_DATA, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_FIRST_GAME_END, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_FIRST_GAME_START, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_ENDED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_FIRST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_FIRST_GAME_STARTED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_GAMES, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_STARTED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_NAME, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_SEASON, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_SEASON_TYPE, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_SHORT_NAME, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_START_DATE, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_WEEK, $current );
    }

    /**
     * Given: A developer API key
     * When: API is queried for current Timeframe
     * Then: Expect a 200 response with an array of 1 entry, that entry containing 16 keys
     *
     * @group Integration
     * @medium
     */
    public function testCompletedTimeframeSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Timeframes(['Type' => Timeframes\Type::KEY_COMPLETED]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we only expect a single response from 'current' */
        $this->assertCount( 1, $result );

        /** test the contents of the response to make sure it has what we expect */
        $current = $result->toArray()[0];

        /** we expect 16 keys */
        $this->assertCount( 16, $current );

        /** test all the keys */
        $this->assertArrayHasKey( Timeframes\Property::KEY_END_DATA, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_FIRST_GAME_END, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_FIRST_GAME_START, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_ENDED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_FIRST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_FIRST_GAME_STARTED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_GAMES, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_HAS_STARTED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_LAST_GAME_ENDED, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_NAME, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_SEASON, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_SEASON_TYPE, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_SHORT_NAME, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_START_DATE, $current );
        $this->assertArrayHasKey( Timeframes\Property::KEY_WEEK, $current );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for current Timeframe
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     *
     * @group Integration
     * @small
     */
    public function testInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->Timeframes(['Type' => 'current']);
    }
}
