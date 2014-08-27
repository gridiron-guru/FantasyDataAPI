<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\FantasyDefenseBySeason;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\FantasyDefenseSeason;
use FantasyDataAPI\Enum\ScoringDetails;

class IntegrationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for FantasyDefenseBySeason, Season 2013REG
     * Then: Expect a 200 response with an array entries that each contain PlayerGame and ScoringDetails info
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->FantasyDefenseBySeason(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_player_season = function ( $pFantasySeason )
        {
            /** we expect 52 stats */
            $this->assertCount( 52, $pFantasySeason );

            $cloned_array = $pFantasySeason;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pFantasySeason, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pFantasySeason );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( FantasyDefenseSeason\Property::KEY_ASSISTED_TACKLES );
            $process_key( FantasyDefenseSeason\Property::KEY_BLOCKED_KICK_RETURN_TOUCHDOWNS );
            $process_key( FantasyDefenseSeason\Property::KEY_BLOCKED_KICK_RETURN_YARDS );
            $process_key( FantasyDefenseSeason\Property::KEY_BLOCKED_KICKS );
            $process_key( FantasyDefenseSeason\Property::KEY_DEFENSIVE_TOUCHDOWNS );
            $process_key( FantasyDefenseSeason\Property::KEY_FANTASY_POINTS );
            $process_key( FantasyDefenseSeason\Property::KEY_FANTASY_POINTS_ALLOWED );
            $process_key( FantasyDefenseSeason\Property::KEY_FOURTH_DOWN_ATTEMPTS );
            $process_key( FantasyDefenseSeason\Property::KEY_FOURTH_DOWN_CONVERSIONS );
            $process_key( FantasyDefenseSeason\Property::KEY_FIELD_GOAL_RETURN_TOUCHDOWNS );
            $process_key( FantasyDefenseSeason\Property::KEY_FIELD_GOAL_RETURN_YARDS );
            $process_key( FantasyDefenseSeason\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS );
            $process_key( FantasyDefenseSeason\Property::KEY_FUMBLE_RETURN_YARDS );
            $process_key( FantasyDefenseSeason\Property::KEY_FUMBLES_FORCED );
            $process_key( FantasyDefenseSeason\Property::KEY_FUMBLES_RECOVERED );
            $process_key( FantasyDefenseSeason\Property::KEY_GAMES );
            $process_key( FantasyDefenseSeason\Property::KEY_HUMIDITY );
            $process_key( FantasyDefenseSeason\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS );
            $process_key( FantasyDefenseSeason\Property::KEY_INTERCEPTION_RETURN_YARDS );
            $process_key( FantasyDefenseSeason\Property::KEY_INTERCEPTIONS );
            $process_key( FantasyDefenseSeason\Property::KEY_KICK_RETURN_LONG );
            $process_key( FantasyDefenseSeason\Property::KEY_KICK_RETURN_TOUCHDOWNS );
            $process_key( FantasyDefenseSeason\Property::KEY_KICK_RETURN_YARDS );
            $process_key( FantasyDefenseSeason\Property::KEY_KICK_RETURNS );
            $process_key( FantasyDefenseSeason\Property::KEY_KICKER_FANTASY_POINTS_ALLOWED );
            $process_key( FantasyDefenseSeason\Property::KEY_PASSES_DEFENDED );
            $process_key( FantasyDefenseSeason\Property::KEY_POINTS_ALLOWED );
            $process_key( FantasyDefenseSeason\Property::KEY_POINTS_ALLOWED_BY_DEFENSE_SPECIAL_TEAMS );
            $process_key( FantasyDefenseSeason\Property::KEY_PUNT_RETURN_LONG );
            $process_key( FantasyDefenseSeason\Property::KEY_PUNT_RETURN_TOUCHDOWNS );
            $process_key( FantasyDefenseSeason\Property::KEY_PUNT_RETURN_YARDS );
            $process_key( FantasyDefenseSeason\Property::KEY_PUNT_RETURNS );
            $process_key( FantasyDefenseSeason\Property::KEY_QUARTERBACK_FANTASY_POINTS_ALLOWED );
            $process_key( FantasyDefenseSeason\Property::KEY_QUARTERBACK_HITS );
            $process_key( FantasyDefenseSeason\Property::KEY_RUNNINGBACK_FANTASY_POINTS_ALLOWED );
            $process_key( FantasyDefenseSeason\Property::KEY_SACK_YARDS );
            $process_key( FantasyDefenseSeason\Property::KEY_SACKS );
            $process_key( FantasyDefenseSeason\Property::KEY_SAFETIES );
            $process_key( FantasyDefenseSeason\Property::KEY_SCORING_DETAILS );
            $process_key( FantasyDefenseSeason\Property::KEY_SEASON );
            $process_key( FantasyDefenseSeason\Property::KEY_SEASON_TYPE );
            $process_key( FantasyDefenseSeason\Property::KEY_SOLO_TACKLES );
            $process_key( FantasyDefenseSeason\Property::KEY_SPECIAL_TEAMS_TOUCHDOWNS );
            $process_key( FantasyDefenseSeason\Property::KEY_TACKLES_FOR_LOSS );
            $process_key( FantasyDefenseSeason\Property::KEY_TEAM );
            $process_key( FantasyDefenseSeason\Property::KEY_TEMPERATURE );
            $process_key( FantasyDefenseSeason\Property::KEY_THIRD_DOWN_ATTEMPTS );
            $process_key( FantasyDefenseSeason\Property::KEY_THIRD_DOWN_CONVERSIONS );
            $process_key( FantasyDefenseSeason\Property::KEY_TIGHT_END_FANTASY_POINTS_ALLOWED );
            $process_key( FantasyDefenseSeason\Property::KEY_TOUCHDOWNS_SCORED );
            $process_key( FantasyDefenseSeason\Property::KEY_WIDE_RECEIVER_FANTASY_POINTS_ALLOWED );
            $process_key( FantasyDefenseSeason\Property::KEY_WINDSPEED );


            if ( false == empty( $pFantasySeason[FantasyDefenseSeason\Property::KEY_SCORING_DETAILS]) )
            {
                foreach ( $pFantasySeason[FantasyDefenseSeason\Property::KEY_SCORING_DETAILS] as $scoring )
                {
                    $cloned_scoring = $scoring;

                    /** we expect 10 keys */
                    $this->assertCount( 10, $cloned_scoring );

                    $process_scoring_details = function ( $pScoringDetails ) use ( &$cloned_scoring )
                    {
                        $this->assertArrayHasKey( $pScoringDetails, $cloned_scoring );
                        unset( $cloned_scoring[$pScoringDetails] );
                    };

                    $process_scoring_details( ScoringDetails\Property::KEY_GAME_KEY );
                    $process_scoring_details( ScoringDetails\Property::KEY_LENGTH );
                    $process_scoring_details( ScoringDetails\Property::KEY_PLAYER_GAME_ID );
                    $process_scoring_details( ScoringDetails\Property::KEY_PLAYER_ID );
                    $process_scoring_details( ScoringDetails\Property::KEY_SCORING_DETAIL_ID );
                    $process_scoring_details( ScoringDetails\Property::KEY_SCORING_TYPE );
                    $process_scoring_details( ScoringDetails\Property::KEY_SEASON );
                    $process_scoring_details( ScoringDetails\Property::KEY_SEASON_TYPE );
                    $process_scoring_details( ScoringDetails\Property::KEY_TEAM );
                    $process_scoring_details( ScoringDetails\Property::KEY_WEEK );

                    $this->assertEmpty( $cloned_scoring );
                }
            }

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_player_season );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for FantasyDefenseBySeason, Season 2013REG
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
        $client->FantasyDefenseBySeason(['Season' => '2013REG']);
    }
}
