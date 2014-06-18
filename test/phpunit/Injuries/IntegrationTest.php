<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Injuries;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\PlayerInjury;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17 Injuries
     * Then: Expect a 200 response with an array entries that each contain Scores and Stadium info
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Injuries(['Season' => '2013REG', 'Week' => '17']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_injuries = function ( $pInjuries )
        {
            /** we expect 15 stats */
            $this->assertCount( 15, $pInjuries );

            $cloned_array = $pInjuries;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pInjuries, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pInjuries );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( PlayerInjury\Property::KEY_BODY_PART );
            $process_key( PlayerInjury\Property::KEY_INJURY_ID );
            $process_key( PlayerInjury\Property::KEY_NAME );
            $process_key( PlayerInjury\Property::KEY_NUMBER );
            $process_key( PlayerInjury\Property::KEY_OPPONENT );
            $process_key( PlayerInjury\Property::KEY_PLAYER_ID );
            $process_key( PlayerInjury\Property::KEY_POSITION );
            $process_key( PlayerInjury\Property::KEY_PRACTICE );
            $process_key( PlayerInjury\Property::KEY_PRACTICE_DESCRIPTION );
            $process_key( PlayerInjury\Property::KEY_SEASON );
            $process_key( PlayerInjury\Property::KEY_SEASON_TYPE );
            $process_key( PlayerInjury\Property::KEY_STATUS );
            $process_key( PlayerInjury\Property::KEY_TEAM );
            $process_key( PlayerInjury\Property::KEY_UPDATED );
            $process_key( PlayerInjury\Property::KEY_WEEK );

            $this->assertEmpty( $cloned_array );
        };
            
        $stats = $result->toArray();

        array_walk( $stats, $check_injuries );
    }

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17 Injuries
     * Then: Expect a 200 response with an array entries that each contain Scores and Stadium info
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulTeamResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Injuries(['Season' => '2013REG', 'Week' => '17', 'Team' => 'NE']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_injuries = function ( $pInjuries )
        {
            /** we expect 15 stats */
            $this->assertCount( 15, $pInjuries );

            $cloned_array = $pInjuries;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pInjuries, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pInjuries );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( PlayerInjury\Property::KEY_BODY_PART );
            $process_key( PlayerInjury\Property::KEY_INJURY_ID );
            $process_key( PlayerInjury\Property::KEY_NAME );
            $process_key( PlayerInjury\Property::KEY_NUMBER );
            $process_key( PlayerInjury\Property::KEY_OPPONENT );
            $process_key( PlayerInjury\Property::KEY_PLAYER_ID );
            $process_key( PlayerInjury\Property::KEY_POSITION );
            $process_key( PlayerInjury\Property::KEY_PRACTICE );
            $process_key( PlayerInjury\Property::KEY_PRACTICE_DESCRIPTION );
            $process_key( PlayerInjury\Property::KEY_SEASON );
            $process_key( PlayerInjury\Property::KEY_SEASON_TYPE );
            $process_key( PlayerInjury\Property::KEY_STATUS );
            $process_key( PlayerInjury\Property::KEY_TEAM );
            $process_key( PlayerInjury\Property::KEY_UPDATED );
            $process_key( PlayerInjury\Property::KEY_WEEK );

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_injuries );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2013REG, Week 17 Injuries
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @group Integration
     * @medium
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function testInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->Injuries(['Season' => '2013REG', 'Week' => '17']);
    }
}
