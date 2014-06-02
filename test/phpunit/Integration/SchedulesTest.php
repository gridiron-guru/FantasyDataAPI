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

use FantasyDataAPI\Enum\Schedule;
use FantasyDataAPI\Enum\Stadium;

class SchedulesTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Schedules
     * Then: Expect a 200 response with an array entries that each contain Schedule and Stadium info
     */
    public function test2014REGSchedulesSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Schedules(['Season' => '2014REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P Schedules for 2014 */
        $this->assertNotCount( 0, $result );

        $check_team_keys = function ( $pSchedule )
        {
            /** we expect 12 keys */
            $this->assertCount( 12, $pSchedule );

            /** test all the keys */
            $this->assertArrayHasKey( Schedule\Property::KEY_AWAY_TEAM, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_CHANNEL, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_DATE, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_GAME_KEY, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_HOME_TEAM, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_OVER_UNDER, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_POINT_SPREAD, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_SEASON, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_SEASON_TYPE, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_STADIUM_DETAILS, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_STADIUM_ID, $pSchedule );
            $this->assertArrayHasKey( Schedule\Property::KEY_WEEK, $pSchedule );

            if ( 'BYE' != $pSchedule[Schedule\Property::KEY_AWAY_TEAM] )
            {
                /** we expect 7 keys */
                $this->assertCount( 7, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );

                /** test all the properties */
                $this->assertArrayHasKey( Stadium\Property::KEY_CAPACITY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_CITY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_COUNTRY, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_NAME, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_PLAYING_SURFACE, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_STADIUM_ID, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
                $this->assertArrayHasKey( Stadium\Property::KEY_STATE, $pSchedule[Schedule\Property::KEY_STADIUM_DETAILS] );
            }
        };

        $schedules = $result->toArray();

        array_walk( $schedules, $check_team_keys );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2014 Schedules
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function test2014REGSchedulesInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->Schedules(['Season' => '2014REG']);
    }
}
