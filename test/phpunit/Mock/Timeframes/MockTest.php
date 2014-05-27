<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Mock\Timeframes;

use PHPUnit_Framework_TestCase;

use FantasyDataAPI\Enum\Timeframes\Type;

class MockTest extends PHPUnit_Framework_TestCase
{
    public function testAPIKeyParameter()
    {

    }

    public function testSubscriptionParameter()
    {

    }

    public function testFormatParameter()
    {

    }



    public function testCanBeNegated()
    {
        // what do we actually want to test...
        // -- Make sure we get a 200 back
        // -- Make sure we have some "validation" on Type
        // -- Make sure we have the various properties in the response?
        // -- Integration tests?
        // -- Do we need/want a Client factory so that we can get Mock vs. Live?



        // $pApiKey, $pSubscription = Enum\Subscription::KEY_DEVELOPER, $pFormat = Enum\Format::KEY_JSON
        // -- make sure all these parameters get into the URL properly


        $client = new MockClient( '000aaaa0-a00a-0000-0a0a-aa0a00000000' );

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Timeframes(['Type' => Type::KEY_CURRENT]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we only expect a single response from 'current' */
        $this->assertCount( 1, $result );

        /** test the contents of the response to make sure it has what we expect */
        $current = $result->toArray()[0];

        print_r($result);

        /** we expect 16 keys */
        $this->assertCount( 16, $current );




    }
}
