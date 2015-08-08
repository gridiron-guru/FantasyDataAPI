<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\AreAnyGamesInProgress;

use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Enum\Timeframes;
use FantasyDataAPI\Test\DebugClient;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for AreAnyGamesInProgress
     * Then: Expect a 200 response with an array of 1 entry, that entry containing 16 keys
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY']);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->AreAnyGamesInProgress([]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we only expect a single response from 'current' */
        $this->assertCount( 1, $result );

        /** test the contents of the response to make sure it has what we expect */
        $answer = $result->toArray()[0];

        $this->assertContains($answer, ["true", "false"]);
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for AreAnyGamesInProgress
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @group Integration
     * @small
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function testInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key');

        /** @var \GuzzleHttp\Command\Model $result */
        $client->AreAnyGamesInProgress(['Type' => 'current']);
    }
}