<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\BoxScore;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\BoxScore;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2013REG, Week 17, Team NE BoxScore
     * Then: Expect a 200 response with an array entries that the BoxScore details
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->BoxScore(['Season' => '2013REG', 'Week' => '17', 'Team' => 'NE']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_box_score = function ( $pStats )
        {
            /** we expect 20 keys */
            $this->assertCount( 20, $pStats );

            $cloned_array = $pStats;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pStats, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pStats );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( BoxScore\Property::KEY_AWAY_DEFENSE );
            $process_key( BoxScore\Property::KEY_AWAY_FANTASY_DEFENSE );
            $process_key( BoxScore\Property::KEY_AWAY_KICK_PUNT_RETURNS );
            $process_key( BoxScore\Property::KEY_AWAY_KICKING );
            $process_key( BoxScore\Property::KEY_AWAY_PASSING );
            $process_key( BoxScore\Property::KEY_AWAY_PUNTING );
            $process_key( BoxScore\Property::KEY_AWAY_RECEIVING );
            $process_key( BoxScore\Property::KEY_AWAY_RUSHING );
            $process_key( BoxScore\Property::KEY_GAME );
            $process_key( BoxScore\Property::KEY_HOME_DEFENSE );
            $process_key( BoxScore\Property::KEY_HOME_FANTASY_DEFENSE );
            $process_key( BoxScore\Property::KEY_HOME_KICK_PUNT_RETURNS );
            $process_key( BoxScore\Property::KEY_HOME_KICKING );
            $process_key( BoxScore\Property::KEY_HOME_PASSING );
            $process_key( BoxScore\Property::KEY_HOME_PUNTING );
            $process_key( BoxScore\Property::KEY_HOME_RECEIVING );
            $process_key( BoxScore\Property::KEY_HOME_RUSHING );
            $process_key( BoxScore\Property::KEY_SCORE );
            $process_key( BoxScore\Property::KEY_SCORING_DETAILS );
            $process_key( BoxScore\Property::KEY_SCORING_PLAYS );

            /** @todo Need to actually validate the contents of all of these keys */

            $this->assertEmpty( $cloned_array );
        };
            
        $stats = $result->toArray();
        $check_box_score( $stats );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2013REG, Week 17, Team NE BoxScore
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
        $client->BoxScore(['Season' => '2013REG', 'Week' => '17', 'Team' => 'NE']);
    }
}
