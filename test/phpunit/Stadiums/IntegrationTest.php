<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Stadiums;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\Stadium;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for Stadiums
     * Then: Expect a 200 response with an array entries that contains the Stadiums details
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Stadiums([]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_game = function ( $pStadium )
        {
            /** we expect 7 stats */
            $this->assertCount( 7, $pStadium );

            $cloned_array = $pStadium;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pStadium, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pStadium );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( Stadium\Property::KEY_CAPACITY );
            $process_key( Stadium\Property::KEY_CITY );
            $process_key( Stadium\Property::KEY_COUNTRY );
            $process_key( Stadium\Property::KEY_NAME );
            $process_key( Stadium\Property::KEY_PLAYING_SURFACE );
            $process_key( Stadium\Property::KEY_STADIUM_ID );
            $process_key( Stadium\Property::KEY_STATE );            

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_game );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for Stadiums
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
        $client->Stadiums([]);
    }
}
