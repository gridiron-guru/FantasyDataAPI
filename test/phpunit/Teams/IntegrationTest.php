<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Teams;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\Teams;
use FantasyDataAPI\Enum\Stadium;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2014 Teams
     * Then: Expect a 200 response with an array entries that each contain Team and Stadium info
     */
    public function test2014TeamsSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Teams(['Season' => '2014']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect 32 teams for 2014 */
        $this->assertCount( 32, $result );

        $check_team_keys = function ( $pTeam )
        {
            /** we expect 19 stats (woah!) */
            $this->assertCount( 19, $pTeam );

            $cloned_array = $pTeam;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pTeam, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pTeam );
                unset( $cloned_array[$pKey] );

                if ( Teams\Property::KEY_STADIUM_DETAILS == $pKey )
                {
                    $pStadium = $pTeam[$pKey];

                    /** we expect 7 keys */
                    $this->assertCount( 7, $pStadium );

                    $cloned_stadium = $pStadium;

                    $process_stadium = function ( $pStadiumKey ) use ( $pStadium, &$cloned_stadium )
                    {
                        $this->assertArrayHasKey( $pStadiumKey, $pStadium );
                        unset( $cloned_stadium[$pStadiumKey] );
                    };

                    /** test all the stadium keys */
                    $process_stadium( Stadium\Property::KEY_CAPACITY );
                    $process_stadium( Stadium\Property::KEY_CITY );
                    $process_stadium( Stadium\Property::KEY_COUNTRY );
                    $process_stadium( Stadium\Property::KEY_NAME );
                    $process_stadium( Stadium\Property::KEY_PLAYING_SURFACE );
                    $process_stadium( Stadium\Property::KEY_STADIUM_ID );
                    $process_stadium( Stadium\Property::KEY_STATE );
                }
            };

            /** test all the keys */
            $process_key( Teams\Property::KEY_CITY );
            $process_key( Teams\Property::KEY_CONFERENCE );
            $process_key( Teams\Property::KEY_DIVISION );
            $process_key( Teams\Property::KEY_FULL_NAME );
            $process_key( Teams\Property::KEY_KEY );
            $process_key( Teams\Property::KEY_NAME );
            $process_key( Teams\Property::KEY_STADIUM_DETAILS );
            $process_key( Teams\Property::KEY_STADIUM_ID );

            /** 06/07/2014 Update */
            $process_key( Teams\Property::KEY_AVERAGE_DRAFT_POSITION );
            $process_key( Teams\Property::KEY_AVERAGE_DRAFT_POSITION_PPR );
            $process_key( Teams\Property::KEY_BYE_WEEK );
            $process_key( Teams\Property::KEY_DEFENSIVE_COORDINATOR );
            $process_key( Teams\Property::KEY_DEFENSIVE_SCHEME );
            $process_key( Teams\Property::KEY_HEAD_COACH );
            $process_key( Teams\Property::KEY_OFFENSIVE_COORDINATOR );
            $process_key( Teams\Property::KEY_OFFENSIVE_SCHEME );
            $process_key( Teams\Property::KEY_SPECIAL_TEAMS_COACH );
            $process_key( Teams\Property::KEY_TEAM_ID );

            /** ?? */
            $process_key( Teams\Property::KEY_PLAYER_ID );

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_team_keys );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2014 Teams
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function test2014TeamsInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->Teams(['Season' => '2014']);
    }
}
