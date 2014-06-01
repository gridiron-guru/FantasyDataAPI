<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Integration;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\Teams;
use FantasyDataAPI\Enum\Stadium;

class TeamsTest extends PHPUnit_Framework_TestCase
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
            /** we expect 8 keys */
            $this->assertCount( 8, $pTeam );

            /** test all the keys */
            $this->assertArrayHasKey( Teams\Property::KEY_CITY, $pTeam );
            $this->assertArrayHasKey( Teams\Property::KEY_CONFERENCE, $pTeam );
            $this->assertArrayHasKey( Teams\Property::KEY_DIVISION, $pTeam );
            $this->assertArrayHasKey( Teams\Property::KEY_FULL_NAME, $pTeam );
            $this->assertArrayHasKey( Teams\Property::KEY_KEY, $pTeam );
            $this->assertArrayHasKey( Teams\Property::KEY_NAME, $pTeam );
            $this->assertArrayHasKey( Teams\Property::KEY_STADIUM_DETAILS, $pTeam );
            $this->assertArrayHasKey( Teams\Property::KEY_STADIUM_ID, $pTeam );

            /** we expect 7 keys */
            $this->assertCount( 7, $pTeam[Teams\Property::KEY_STADIUM_DETAILS] );

            /** test all the properties */
            $this->assertArrayHasKey( Stadium\Property::KEY_CAPACITY, $pTeam[Teams\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_CITY, $pTeam[Teams\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_COUNTRY, $pTeam[Teams\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_NAME, $pTeam[Teams\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_PLAYING_SURFACE, $pTeam[Teams\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_STADIUM_ID, $pTeam[Teams\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_STATE, $pTeam[Teams\Property::KEY_STADIUM_DETAILS] );
        };

        $teams = $result->toArray();

        array_walk( $teams, $check_team_keys );
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
