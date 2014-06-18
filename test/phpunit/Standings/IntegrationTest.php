<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Standings;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\Standings;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Standings
     * Then: Expect a 200 response with an array entries that each contain Schedule and Stadium info
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Standings(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect 32 teams */
        $this->assertCount( 32, $result );

        $check_standings = function ( $pStandings )
        {
            /** we expect 18 stats */
            $this->assertCount( 18, $pStandings );

            $cloned_array = $pStandings;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pStandings, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pStandings );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( Standings\Property::KEY_CONFERENCE );
            $process_key( Standings\Property::KEY_CONFERENCE_LOSSES );
            $process_key( Standings\Property::KEY_CONFERENCE_WINS );
            $process_key( Standings\Property::KEY_DIVISION );
            $process_key( Standings\Property::KEY_DIVISION_LOSSES );
            $process_key( Standings\Property::KEY_DIVSISION_WINS );
            $process_key( Standings\Property::KEY_LOSSES );
            $process_key( Standings\Property::KEY_NAME );
            $process_key( Standings\Property::KEY_NET_POINTS );
            $process_key( Standings\Property::KEY_PERCENTAGE );
            $process_key( Standings\Property::KEY_POINTS_AGAINST );
            $process_key( Standings\Property::KEY_POINTS_FOR );
            $process_key( Standings\Property::KEY_SEASON );
            $process_key( Standings\Property::KEY_SEASON_TYPE );
            $process_key( Standings\Property::KEY_TEAM );
            $process_key( Standings\Property::KEY_TIES );
            $process_key( Standings\Property::KEY_TOUCHDOWNS );
            $process_key( Standings\Property::KEY_WINS );

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_standings );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2014 Standings
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
        $client->Standings(['Season' => '2013REG']);
    }
}
