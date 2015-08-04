<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\PlayerSeasonStatsByPlayerID;

use PHPUnit_Framework_TestCase;
use FantasyDataAPI\Test\DebugClient;
use FantasyDataAPI\Enum\Subscription;

use FantasyDataAPI\Enum\PlayerSeason;
use FantasyDataAPI\Enum\ScoringDetails;

class PlayerSeasonStatsByPlayerIDTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for PlayerSeasonStatsByPlayerID, Season 2013REG, PlayerID 10974
     * Then: Expect a 200 response with an array entries that each contain PlayerSeason and ScoringDetails
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->PlayerSeasonStatsByPlayerID(['Season' => '2014REG', 'PlayerID' => '10974']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect a non-empty array of players */
        $this->assertNotEmpty( $result );

        $check_player_season = function ( $pPlayerSeason )
        {
            /** we expect 124 stats */
            $this->assertCount( 124, $pPlayerSeason );

            $cloned_array = $pPlayerSeason;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pPlayerSeason, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pPlayerSeason );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( PlayerSeason\Property::KEY_ACTIVATED );
            $process_key( PlayerSeason\Property::KEY_ASSISTED_TACKLES );
            $process_key( PlayerSeason\Property::KEY_BLOCKED_KICK_RETURN_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_BLOCKED_KICK_RETURN_YARDS );
            $process_key( PlayerSeason\Property::KEY_BLOCKED_KICKS );
            $process_key( PlayerSeason\Property::KEY_D365_FANTASY_POINTS );
            $process_key( PlayerSeason\Property::KEY_DEFENSIVE_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_EXTRA_POINTS_ATTEMPTED );
            $process_key( PlayerSeason\Property::KEY_EXTRA_POINTS_HAD_BLOCKED );
            $process_key( PlayerSeason\Property::KEY_EXTRA_POINTS_MADE );
            $process_key( PlayerSeason\Property::KEY_FANTASY_POINTS );
            $process_key( PlayerSeason\Property::KEY_FANTASY_POINTS_PPR );
            $process_key( PlayerSeason\Property::KEY_FANTASY_POSITION );
            $process_key( PlayerSeason\Property::KEY_FIELD_GOAL_PERCENTAGE );
            $process_key( PlayerSeason\Property::KEY_FIELD_GOAL_RETURN_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_FIELD_GOAL_RETURN_YARDS );
            $process_key( PlayerSeason\Property::KEY_FIELD_GOALS_ATTEMPTED );
            $process_key( PlayerSeason\Property::KEY_FIELD_GOALS_HAD_BLOCKED );
            $process_key( PlayerSeason\Property::KEY_FIELD_GOALS_LONGEST_MADE );
            $process_key( PlayerSeason\Property::KEY_FIELD_GOALS_MADE );
            $process_key( PlayerSeason\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_FUMBLE_RETURN_YARDS );
            $process_key( PlayerSeason\Property::KEY_FUMBLES );
            $process_key( PlayerSeason\Property::KEY_FUMBLES_FORCED );
            $process_key( PlayerSeason\Property::KEY_FUMBLES_LOST );
            $process_key( PlayerSeason\Property::KEY_FUMBLES_OUT_OF_BOUNDS );
            $process_key( PlayerSeason\Property::KEY_FUMBLES_OWN_RECOVERIES );
            $process_key( PlayerSeason\Property::KEY_FUMBLES_RECOVERED );
            $process_key( PlayerSeason\Property::KEY_HUMIDITY );
            $process_key( PlayerSeason\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_INTERCEPTION_RETURN_YARDS );
            $process_key( PlayerSeason\Property::KEY_INTERCEPTIONS );
            $process_key( PlayerSeason\Property::KEY_KICK_RETURN_FAIR_CATCHES );
            $process_key( PlayerSeason\Property::KEY_KICK_RETURN_LONG );
            $process_key( PlayerSeason\Property::KEY_KICK_RETURN_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_KICK_RETURN_YARDS );
            $process_key( PlayerSeason\Property::KEY_KICK_RETURN_YARDS_PER_ATTEMPT );
            $process_key( PlayerSeason\Property::KEY_KICK_RETURNS );
            $process_key( PlayerSeason\Property::KEY_MISC_ASSISTED_TACKLES );
            $process_key( PlayerSeason\Property::KEY_MISC_FUMBLES_FORCED );
            $process_key( PlayerSeason\Property::KEY_MISC_FUMBLES_RECOVERED );
            $process_key( PlayerSeason\Property::KEY_MISC_SOLO_TACKLES );
            $process_key( PlayerSeason\Property::KEY_NAME );
            $process_key( PlayerSeason\Property::KEY_NUMBER );
            $process_key( PlayerSeason\Property::KEY_OFFENSIVE_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_PASSES_DEFENDED );
            $process_key( PlayerSeason\Property::KEY_PASSING_ATTEMPTS );
            $process_key( PlayerSeason\Property::KEY_PASSING_COMPLETION_PERCENTAGE );
            $process_key( PlayerSeason\Property::KEY_PASSING_COMPLETIONS );
            $process_key( PlayerSeason\Property::KEY_PASSING_INTERCEPTIONS );
            $process_key( PlayerSeason\Property::KEY_PASSING_LONG );
            $process_key( PlayerSeason\Property::KEY_PASSING_RATING );
            $process_key( PlayerSeason\Property::KEY_PASSING_SACK_YARDS );
            $process_key( PlayerSeason\Property::KEY_PASSING_SACKS );
            $process_key( PlayerSeason\Property::KEY_PASSING_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_PASSING_YARDS );
            $process_key( PlayerSeason\Property::KEY_PASSING_YARDS_PER_ATTEMPT );
            $process_key( PlayerSeason\Property::KEY_PASSING_YARDS_PER_COMPLETION );
            $process_key( PlayerSeason\Property::KEY_PLAYED );
            $process_key( PlayerSeason\Property::KEY_PLAYER_ID );
            $process_key( PlayerSeason\Property::KEY_PLAYER_SEASON_ID );
            $process_key( PlayerSeason\Property::KEY_POSITION );
            $process_key( PlayerSeason\Property::KEY_POSITION_CATEGORY );
            $process_key( PlayerSeason\Property::KEY_PUNT_AVERAGE );
            $process_key( PlayerSeason\Property::KEY_PUNT_INSIDE_20 );
            $process_key( PlayerSeason\Property::KEY_PUNT_LONG );
            $process_key( PlayerSeason\Property::KEY_PUNT_NET_AVERAGE );
            $process_key( PlayerSeason\Property::KEY_PUNT_NET_YARDS );
            $process_key( PlayerSeason\Property::KEY_PUNT_RETURN_FAIR_CATCHES );
            $process_key( PlayerSeason\Property::KEY_PUNT_RETURN_LONG );
            $process_key( PlayerSeason\Property::KEY_PUNT_RETURN_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_PUNT_RETURN_YARDS );
            $process_key( PlayerSeason\Property::KEY_PUNT_RETURN_YARDS_PER_ATTEMPT );
            $process_key( PlayerSeason\Property::KEY_PUNT_RETURNS );
            $process_key( PlayerSeason\Property::KEY_PUNT_TOUCHBACKS );
            $process_key( PlayerSeason\Property::KEY_PUNT_YARDS );
            $process_key( PlayerSeason\Property::KEY_PUNTS );
            $process_key( PlayerSeason\Property::KEY_PUNTS_HAD_BLOCKED );
            $process_key( PlayerSeason\Property::KEY_QUARTERBACK_HITS );
            $process_key( PlayerSeason\Property::KEY_RECEIVING_LONG );
            $process_key( PlayerSeason\Property::KEY_RECEIVING_TARGETS );
            $process_key( PlayerSeason\Property::KEY_RECEIVING_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_RECEIVING_YARDS );
            $process_key( PlayerSeason\Property::KEY_RECEIVING_YARDS_PER_RECEPTION );
            $process_key( PlayerSeason\Property::KEY_RECEIVING_YARDS_PER_TARGET );
            $process_key( PlayerSeason\Property::KEY_RECEPTION_PERCENTAGE );
            $process_key( PlayerSeason\Property::KEY_RECEPTIONS );
            $process_key( PlayerSeason\Property::KEY_RUSHING_ATTEMPTS );
            $process_key( PlayerSeason\Property::KEY_RUSHING_LONG );
            $process_key( PlayerSeason\Property::KEY_RUSHING_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_RUSHING_YARDS );
            $process_key( PlayerSeason\Property::KEY_RUSHING_YARDS_PER_ATTEMPT );
            $process_key( PlayerSeason\Property::KEY_SACK_YARDS );
            $process_key( PlayerSeason\Property::KEY_SACKS );
            $process_key( PlayerSeason\Property::KEY_SAFETIES );
            $process_key( PlayerSeason\Property::KEY_SAFETIES_ALLOWED );
            $process_key( PlayerSeason\Property::KEY_SCORING_DETAILS );
            $process_key( PlayerSeason\Property::KEY_SEASON );
            $process_key( PlayerSeason\Property::KEY_SEASON_TYPE );
            $process_key( PlayerSeason\Property::KEY_SHORT_NAME );
            $process_key( PlayerSeason\Property::KEY_SOLO_TACKLES );
            $process_key( PlayerSeason\Property::KEY_SPECIAL_TEAMS_ASSISTED_TACKLES );
            $process_key( PlayerSeason\Property::KEY_SPECIAL_TEAMS_FUMBLES_FORCED );
            $process_key( PlayerSeason\Property::KEY_SPECIAL_TEAMS_FUMBLES_RECOVERED );
            $process_key( PlayerSeason\Property::KEY_SPECIAL_TEAMS_SOLO_TACKLES );
            $process_key( PlayerSeason\Property::KEY_SPECIAL_TEAMS_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_STARTED );
            $process_key( PlayerSeason\Property::KEY_TACKLES );
            $process_key( PlayerSeason\Property::KEY_TACKLES_FOR_LOSS );
            $process_key( PlayerSeason\Property::KEY_TEAM );
            $process_key( PlayerSeason\Property::KEY_TEMPERATURE );
            $process_key( PlayerSeason\Property::KEY_TOUCHDOWNS );
            $process_key( PlayerSeason\Property::KEY_TWO_POINT_CONVERSION_PASSES );
            $process_key( PlayerSeason\Property::KEY_TWO_POINT_CONVERSION_RECEPTIONS );
            $process_key( PlayerSeason\Property::KEY_TWO_POINT_CONVERSION_RUNS );
            $process_key( PlayerSeason\Property::KEY_WINDSPEED );
            /** ADDED IN V2 */
            $process_key( PlayerSeason\Property::KEY_OFFENSIVE_SNAPS_MADE );
            $process_key( PlayerSeason\Property::KEY_DEFENSIVE_SNAPS_PLAYED );
            $process_key( PlayerSeason\Property::KEY_SPECIAL_TEAMS_SNAPS_PLAYED );
            $process_key( PlayerSeason\Property::KEY_OFFENSIVE_TEAM_SNAPS );
            $process_key( PlayerSeason\Property::KEY_DEFENSIVE_TEAM_SNAPS );
            $process_key( PlayerSeason\Property::KEY_SPECIAL_TEAMS_TEAM_SNAPS );
            $process_key( PlayerSeason\Property::KEY_AUCTION_VALUE );
            $process_key( PlayerSeason\Property::KEY_AUCTION_VALUE_PPR );

            if ( false == empty( $pPlayerSeason[PlayerSeason\Property::KEY_SCORING_DETAILS]) )
            {
                foreach ( $pPlayerSeason[PlayerSeason\Property::KEY_SCORING_DETAILS] as $scoring )
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
     * When: API is queried for PlayerSeasonStatsByPlayerID, Season 2013REG, Team NE
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
        $client->PlayerSeasonStatsByPlayerID(['Season' => '2013REG', 'PlayerID' => '10974']);
    }
}
