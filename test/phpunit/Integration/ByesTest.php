<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Integration;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\Byes;

class ByesTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Byes
     * Then: Expect a 200 response with an array entries that each contain Schedule and Stadium info
     */
    public function test2014REGByesSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Byes(['Season' => '2014REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P Byes for 2014 */
        $this->assertNotCount( 0, $result );

        $check_byes_keys = function ( $pByes )
        {
            /** we expect 12 keys */
            $this->assertCount( 3, $pByes );

            /** test all the keys */
            $this->assertArrayHasKey( Byes\Property::KEY_WEEK, $pByes );
            $this->assertArrayHasKey( Byes\Property::KEY_SEASON, $pByes );
            $this->assertArrayHasKey( Byes\Property::KEY_TEAM, $pByes );
        };

        $byes = $result->toArray();

        array_walk( $byes, $check_byes_keys );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2014REG Byes
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function test2014REGByesInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->Byes(['Season' => '2014REG']);
    }
}
