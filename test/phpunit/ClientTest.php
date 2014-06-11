<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test;

use FantasyDataAPI;
use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Enum;
use InvalidArgumentException;

class ClientTest extends PHPUnit_Framework_TestCase
{
    /**
     * Given a valid API key
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned
     */
    public function testClientCreatedWithApiKey()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000');

        $this->assertInstanceOf( 'FantasyDataAPI\Client', $client );
    }

    /**
     * Given an empty API key
     * When a new FantasyDataAPI Service is created
     * Then an InvalidArgumentException is thrown
     *
     * @expectedException InvalidArgumentException
     */
    public function testClientCreatedWithoutApiKey()
    {
        new FantasyDataAPI\Client('');
    }

    /**
     * Given a valid API key
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned with the proper default key value
     */
    public function testClientApiKeySetProperly()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000');

        $this->assertEquals( '000aaaa0-a00a-0000-0a0a-aa0a00000000', $client->getConfig('defaults/key') );
    }

    /**
     * Given an invalid Subscription value
     * When a new FantasyDataAPI Service is created
     * Then an InvalidArgumentException is thrown
     *
     * @expectedException InvalidArgumentException
     */
    public function testClientCreatedWithInvalidSubscription()
    {
        new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000', 'bob');
    }

    /**
     * Given a valid API key and Valid Subscription of Free Trial
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned
     */
    public function testClientCreatedWithSubscriptionFreeTrial()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000', Enum\Subscription::KEY_FREE_TRIAL);

        $this->assertInstanceOf( 'FantasyDataAPI\Client', $client );
    }

    /**
     * Given a valid API key and Valid Subscription of Developer
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned
     */
    public function testClientCreatedWithSubscriptionDeveloper()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000', Enum\Subscription::KEY_DEVELOPER);

        $this->assertInstanceOf( 'FantasyDataAPI\Client', $client );
    }

    /**
     * Given a valid API key and Valid Subscription of Standard
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned
     */
    public function testClientCreatedWithSubscriptionStandard()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000', Enum\Subscription::KEY_STANDARD);

        $this->assertInstanceOf( 'FantasyDataAPI\Client', $client );
    }

    /**
     * Given a valid API key and Valid Subscription of Premium
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned
     */
    public function testClientCreatedWithSubscriptionPremium()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000', Enum\Subscription::KEY_PREMIUM);

        $this->assertInstanceOf( 'FantasyDataAPI\Client', $client );
    }

    /**
     * Given a valid API key and Valid Subscription of Enterprise
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned
     */
    public function testClientCreatedWithSubscriptionEnterprise()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000', Enum\Subscription::KEY_ENTERPRISE);

        $this->assertInstanceOf( 'FantasyDataAPI\Client', $client );
    }

    /**
     * Given a valid API key and Valid Subscription of Enterprise
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned with the proper default Subscription value
     */
    public function testClientSubscriptionSetProperly()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000', Enum\Subscription::KEY_ENTERPRISE);

        $this->assertEquals( Enum\Subscription::KEY_ENTERPRISE, $client->getConfig('defaults/Subscription') );
    }

    /**
     * Given a valid API key
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned with the proper default Subscription of Developer
     */
    public function testClientDefaultSubscription()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000');

        $this->assertEquals( Enum\Subscription::KEY_DEVELOPER, $client->getConfig('defaults/Subscription') );
    }

    /**
     * Given a valid API key
     * When a new FantasyDataAPI Service is created
     * Then a FantasyDataAPI client is returned with the proper Service Description and Base URL Host
     */
    public function testClientServiceDescriptionBaseUrlValue()
    {
        $client = new FantasyDataAPI\Client('000aaaa0-a00a-0000-0a0a-aa0a00000000');

        $base = $client->getDescription()->getBaseUrl();
        $uri = $client->getDescription()->getData('baseUrl');
        $host = $base->getHost();

        $this->assertInstanceOf( 'GuzzleHttp\Url', $base );
        $this->assertEquals( 'api.nfldata.apiphany.com', $host );
        $this->assertEquals( 'http://api.nfldata.apiphany.com/{Subscription}/{Format}/', $uri );
    }
}