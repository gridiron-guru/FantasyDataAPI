<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\News;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\PlayerNews;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for News
     * Then: Expect a 200 response with an array of PlayerNews resources
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->News([]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_news = function ( $pNews )
        {
            /** we expect 9 stats */
            $this->assertCount( 9, $pNews );

            $cloned_array = $pNews;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pNews, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pNews );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( PlayerNews\Property::KEY_CONTENT );
            $process_key( PlayerNews\Property::KEY_NEWS_ID );
            $process_key( PlayerNews\Property::KEY_PLAYER_ID );
            $process_key( PlayerNews\Property::KEY_SOURCE );
            $process_key( PlayerNews\Property::KEY_TEAM );
            $process_key( PlayerNews\Property::KEY_TERMS_OF_USE );
            $process_key( PlayerNews\Property::KEY_TITLE );
            $process_key( PlayerNews\Property::KEY_UPDATED );
            $process_key( PlayerNews\Property::KEY_URL );

            $this->assertEmpty( $cloned_array );
        };
            
        $stats = $result->toArray();

        array_walk( $stats, $check_news );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for News
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @group Integration
     * @small
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function testInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->News([]);
    }
}
