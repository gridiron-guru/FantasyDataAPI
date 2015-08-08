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

use FantasyDataAPI\Enum\GameStatsBySeason;
use FantasyDataAPI\Enum\Stadium;

class GameStatsBySeasonTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for GameStats, Season 2013REG
     * Then: Expect a 200 response with an array entries that each contain Players, PlayerNews and PlayerSeason info
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->GameStats(['Season' => '2013REG']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_game = function ( $pGame )
        {
            /** we expect 211 stats */
            $this->assertCount( 211, $pGame );

            $cloned_array = $pGame;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pGame, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pGame );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( GameStatsBySeason\Property::KEY_AWAY_ASSISTED_TACKLES );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_BLOCKED_KICK_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_BLOCKED_KICK_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_BLOCKED_KICKS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_COMPLETION_PERCENTAGE );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_EXTRA_POINT_KICKING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_EXTRA_POINT_KICKING_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_EXTRA_POINT_PASSING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_EXTRA_POINT_PASSING_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_EXTRA_POINT_RUSHING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_EXTRA_POINT_RUSHING_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_EXTRA_POINTS_HAD_BLOCKED );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIELD_GOAL_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIELD_GOAL_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIELD_GOAL_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIELD_GOALS_HAD_BLOCKED );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIELD_GOALS_MADE );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIRST_DOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIRST_DOWNS_BY_PASSING );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIRST_DOWNS_BY_PENALTY );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FIRST_DOWNS_BY_RUSHING );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FOURTH_DOWN_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FOURTH_DOWN_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FOURTH_DOWN_PERCENTAGE );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FUMBLE_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FUMBLE_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FUMBLES );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FUMBLES_FORCED );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FUMBLES_LOST );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_FUMBLES_RECOVERED );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_GIVEAWAYS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_GOAL_TO_GO_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_GOAL_TO_GO_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_INTERCEPTION_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_INTERCEPTION_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_INTERCEPTION_RETURNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_KICK_RETURN_LONG );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_KICK_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_KICK_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_KICK_RETURNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_KICKOFF_TOUCHBACKS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_KICKOFFS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_KICKOFFS_IN_END_ZONE );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_OFFENSIVE_PLAYS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_OFFENSIVE_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_OFFENSIVE_YARDS_PER_PLAY );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSER_RATING );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSES_DEFENDED );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSING_COMPLETIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSING_INTERCEPTIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSING_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSING_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSING_YARDS_PER_ATTEMPT );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PASSING_YARDS_PER_COMPLETION );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PENALTIES );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PENALTY_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNT_AVERAGE );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNT_NET_AVERAGE );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNT_NET_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNT_RETURN_LONG );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNT_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNT_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNT_RETURNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNT_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_PUNTS_HAD_BLOCKED );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_QUARTERBACK_HITS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_RED_ZONE_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_RED_ZONE_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_RUSHING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_RUSHING_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_RUSHING_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_RUSHING_YARDS_PER_ATTEMPT );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SACK_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SACKS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SAFETIES );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SCORE );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SCORE_OVERTIME );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SCORE_QUARTER_FIRST );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SCORE_QUARTER_SECOND );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SCORE_QUARTER_THIRD );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SCORE_QUARTER_FOURTH );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_SOLO_TACKLES );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TACKLES_FOR_LOSS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TAKEAWAYS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TEAM );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_THIRD_DOWN_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_THIRD_DOWN_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_THIRD_DOWN_PERCENTAGE );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TIME_OF_POSSESSION );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TIMES_SACKED );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TIMES_SACKED_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TURNOVER_DIFFERENTIAL );

            $process_key( GameStatsBySeason\Property::KEY_DATE );
            $process_key( GameStatsBySeason\Property::KEY_GAME_ID );
            $process_key( GameStatsBySeason\Property::KEY_GAME_KEY );

            $process_key( GameStatsBySeason\Property::KEY_HOME_ASSISTED_TACKLES );
            $process_key( GameStatsBySeason\Property::KEY_HOME_BLOCKED_KICK_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_BLOCKED_KICK_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_BLOCKED_KICKS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_COMPLETION_PERCENTAGE );
            $process_key( GameStatsBySeason\Property::KEY_HOME_EXTRA_POINT_KICKING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_EXTRA_POINT_KICKING_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_EXTRA_POINT_PASSING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_EXTRA_POINT_PASSING_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_EXTRA_POINT_RUSHING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_EXTRA_POINT_RUSHING_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_EXTRA_POINTS_HAD_BLOCKED );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIELD_GOAL_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIELD_GOAL_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIELD_GOAL_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIELD_GOALS_HAD_BLOCKED );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIELD_GOALS_MADE );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIRST_DOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIRST_DOWNS_BY_PASSING );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIRST_DOWNS_BY_PENALTY );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FIRST_DOWNS_BY_RUSHING );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FOURTH_DOWN_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FOURTH_DOWN_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FOURTH_DOWN_PERCENTAGE );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FUMBLE_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FUMBLE_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FUMBLES );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FUMBLES_FORCED );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FUMBLES_LOST );
            $process_key( GameStatsBySeason\Property::KEY_HOME_FUMBLES_RECOVERED );
            $process_key( GameStatsBySeason\Property::KEY_HOME_GIVEAWAYS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_GOAL_TO_GO_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_GOAL_TO_GO_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_INTERCEPTION_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_INTERCEPTION_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_INTERCEPTION_RETURNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_KICK_RETURN_LONG );
            $process_key( GameStatsBySeason\Property::KEY_HOME_KICK_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_KICK_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_KICK_RETURNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_KICKOFF_TOUCHBACKS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_KICKOFFS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_KICKOFFS_IN_END_ZONE );
            $process_key( GameStatsBySeason\Property::KEY_HOME_OFFENSIVE_PLAYS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_OFFENSIVE_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_OFFENSIVE_YARDS_PER_PLAY );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSER_RATING );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSES_DEFENDED );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSING_COMPLETIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSING_INTERCEPTIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSING_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSING_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSING_YARDS_PER_ATTEMPT );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PASSING_YARDS_PER_COMPLETION );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PENALTIES );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PENALTY_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNT_AVERAGE );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNT_NET_AVERAGE );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNT_NET_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNT_RETURN_LONG );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNT_RETURN_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNT_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNT_RETURNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNT_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_PUNTS_HAD_BLOCKED );
            $process_key( GameStatsBySeason\Property::KEY_HOME_QUARTERBACK_HITS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_RED_ZONE_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_RED_ZONE_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_RETURN_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_RUSHING_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_RUSHING_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_RUSHING_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_RUSHING_YARDS_PER_ATTEMPT );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SACK_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SACKS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SAFETIES );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SCORE );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SCORE_OVERTIME );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SCORE_QUARTER_FIRST );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SCORE_QUARTER_SECOND );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SCORE_QUARTER_THIRD );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SCORE_QUARTER_FOURTH );
            $process_key( GameStatsBySeason\Property::KEY_HOME_SOLO_TACKLES );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TACKLES_FOR_LOSS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TAKEAWAYS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TEAM );
            $process_key( GameStatsBySeason\Property::KEY_HOME_THIRD_DOWN_ATTEMPTS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_THIRD_DOWN_CONVERSIONS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_THIRD_DOWN_PERCENTAGE );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TIME_OF_POSSESSION );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TIMES_SACKED );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TIMES_SACKED_YARDS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TOUCHDOWNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TURNOVER_DIFFERENTIAL );

            $process_key( GameStatsBySeason\Property::KEY_HUMIDITY );
            $process_key( GameStatsBySeason\Property::KEY_IS_GAME_OVER );
            $process_key( GameStatsBySeason\Property::KEY_OVER_UNDER );
            $process_key( GameStatsBySeason\Property::KEY_PLAYING_SURFACE );
            $process_key( GameStatsBySeason\Property::KEY_POINT_SPREAD );
            $process_key( GameStatsBySeason\Property::KEY_SEASON );
            $process_key( GameStatsBySeason\Property::KEY_SEASON_TYPE );
            $process_key( GameStatsBySeason\Property::KEY_STADIUM );
            $process_key( GameStatsBySeason\Property::KEY_STADIUM_DETAILS );
            $process_key( GameStatsBySeason\Property::KEY_STADIUM_ID );
            $process_key( GameStatsBySeason\Property::KEY_TEMPERATURE );
            $process_key( GameStatsBySeason\Property::KEY_TOTAL_SCORE );
            $process_key( GameStatsBySeason\Property::KEY_WEEK );
            $process_key( GameStatsBySeason\Property::KEY_WIND_SPEED );
            $process_key( GameStatsBySeason\Property::KEY_AWAY_TWO_POINT_CONVERSION_RETURNS );
            $process_key( GameStatsBySeason\Property::KEY_HOME_TWO_POINT_CONVERSION_RETURNS );

            if ( false == empty( $pGame[GameStatsBySeason\Property::KEY_STADIUM_DETAILS]) )
            {
                $cloned_stadium = $pGame[GameStatsBySeason\Property::KEY_STADIUM_DETAILS];

                /** we expect 7 keys */
                $this->assertCount( 7, $cloned_stadium );

                $process_stadium_details = function ( $pStadiumDetails ) use ( &$cloned_stadium )
                {
                    $this->assertArrayHasKey( $pStadiumDetails, $cloned_stadium );
                    unset( $cloned_stadium[$pStadiumDetails] );
                };

                $process_stadium_details( Stadium\Property::KEY_CAPACITY );
                $process_stadium_details( Stadium\Property::KEY_CITY );
                $process_stadium_details( Stadium\Property::KEY_COUNTRY );
                $process_stadium_details( Stadium\Property::KEY_NAME );
                $process_stadium_details( Stadium\Property::KEY_PLAYING_SURFACE );
                $process_stadium_details( Stadium\Property::KEY_STADIUM_ID );
                $process_stadium_details( Stadium\Property::KEY_STATE );

                $this->assertEmpty( $cloned_stadium );
            }

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_game );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for GameStats, Season 2013REG
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
        $client->GameStats(['Season' => '2013REG']);
    }
}
