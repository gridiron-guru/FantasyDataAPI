<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Scores;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\Score;
use FantasyDataAPI\Enum\Stadium;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2014REG Scores
     * Then: Expect a 200 response with an array entries that each contain Scores and Stadium info
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->Scores(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect more than zero :-P Scores for 2013 */
        $this->assertNotCount( 0, $result );

        $check_score_keys = function ( $pScore )
        {
            /** we expect 12 keys */
            $this->assertCount( 43, $pScore );

            /** test all the keys */
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_OVERTIME, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_QUARTER_1ST, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_QUARTER_2ND, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_QUARTER_3RD, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_SCORE_QUARTER_4TH, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_AWAY_TEAM, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_CHANNEL, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_DATE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_DISTANCE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_DOWN, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_DOWN_AND_DISTANCE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_GAME_KEY, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_1ST_QUARTER_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_2ND_QUARTER_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_3RD_QUARTER_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_4TH_QUARTER_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HAS_STARTED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_OVERTIME, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_QUARTER_1ST, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_QUARTER_2ND, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_QUARTER_3RD, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_SCORE_QUARTER_4TH, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_HOME_TEAM, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_IS_IN_PROGRESS, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_IS_OVER, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_IS_OVERTIME, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_LAST_UPDATED, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_OVER_UNDER, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_POINT_SPREAD, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_POSSESSION, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_QUARTER, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_QUARTER_DESCRIPTION, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_RED_ZONE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_SEASON, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_SEASON_TYPE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_STADIUM_DETAILS, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_STADIUM_ID, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_TIME_REMAINING, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_WEEK, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_YARD_LINE, $pScore );
            $this->assertArrayHasKey( Score\Property::KEY_YARD_LINE_TERRITORY, $pScore );

            /** we expect 7 keys */
            $this->assertCount( 7, $pScore[Score\Property::KEY_STADIUM_DETAILS] );

            /** test all the properties */
            $this->assertArrayHasKey( Stadium\Property::KEY_CAPACITY, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_CITY, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_COUNTRY, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_NAME, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_PLAYING_SURFACE, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_STADIUM_ID, $pScore[Score\Property::KEY_STADIUM_DETAILS] );
            $this->assertArrayHasKey( Stadium\Property::KEY_STATE, $pScore[Score\Property::KEY_STADIUM_DETAILS] );

        };

        $schedules = $result->toArray();

        array_walk( $schedules, $check_score_keys );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2013 Scores
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
        $client->Scores(['Season' => '2013REG']);
    }
}
