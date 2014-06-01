<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Integration;

use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Enum\Timeframes;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;
use FantasyDataAPI\Enum\Format;

class AreAnyGamesInProgressTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for AreAnyGamesInProgress
     * Then: Expect a 200 response with an array of 1 entry, that entry containing 16 keys
     */
    public function testAreAnyGamesInProgressSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER, Format::KEY_XML);

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
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function testAreAnyGamesInProgressInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->Timeframes(['Type' => 'current']);
    }
}