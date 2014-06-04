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

use FantasyDataAPI\Enum\TeamGameStats;

class TeamGameStatsTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for 2013, Week 17 TeamGameStats
     * Then: Expect a 200 response with an array entries that each contain Scores and Stadium info
     */
    public function test2013REGWeek17TeamGameStatsSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->TeamGameStats(['Season' => '2013REG', 'Week' => '17']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect 32 teams */
        $this->assertCount( 32, $result );

        $check_team_game_stats_keys = function ( $pTeamGameStats )
        {
            /** we expect 232 stats (woah!) */
            $this->assertCount( 232, $pTeamGameStats );

            $cloned_array = $pTeamGameStats;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pTeamGameStats, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pTeamGameStats );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( TeamGameStats\Property::KEY_ASSISTED_TACKLES );
            $process_key( TeamGameStats\Property::KEY_BLOCKED_KICK_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_BLOCKED_KICK_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_BLOCKED_KICKS );
            $process_key( TeamGameStats\Property::KEY_COMPLETION_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_EXTRA_POINT_KICKING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_EXTRA_POINT_KICKING_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_EXTRA_POINT_PASSING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_EXTRA_POINT_PASSING_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_EXTRA_POINT_RUSHING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_EXTRA_POINT_RUSHING_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_EXTRA_POINTS_HAD_BLOCKED );
            $process_key( TeamGameStats\Property::KEY_FIELD_GOAL_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_FIELD_GOAL_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_FIELD_GOAL_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_FIELD_GOALS_HAD_BLOCKED );
            $process_key( TeamGameStats\Property::KEY_FIELD_GOALS_MADE );
            $process_key( TeamGameStats\Property::KEY_FIRST_DOWNS );
            $process_key( TeamGameStats\Property::KEY_FIRST_DOWNS_BY_PASSING );
            $process_key( TeamGameStats\Property::KEY_FIRST_DOWNS_BY_PENALTY );
            $process_key( TeamGameStats\Property::KEY_FIRST_DOWNS_BY_RUSHING );
            $process_key( TeamGameStats\Property::KEY_FOURTH_DOWN_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_FOURTH_DOWN_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_FOURTH_DOWN_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_FUMBLE_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_FUMBLES );
            $process_key( TeamGameStats\Property::KEY_FUMBLES_FORCED );
            $process_key( TeamGameStats\Property::KEY_FUMBLES_LOST );
            $process_key( TeamGameStats\Property::KEY_FUMBLES_RECOVERED );
            $process_key( TeamGameStats\Property::KEY_GAME_KEY );
            $process_key( TeamGameStats\Property::KEY_GIVEAWAYS );
            $process_key( TeamGameStats\Property::KEY_GOAL_TO_GO_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_GOAL_TO_GO_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_GOAL_TO_GO_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_HUMIDITY );
            $process_key( TeamGameStats\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_INTERCEPTION_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_INTERCEPTION_RETURNS );
            $process_key( TeamGameStats\Property::KEY_KICK_RETURN_LONG );
            $process_key( TeamGameStats\Property::KEY_KICK_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_KICK_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_KICK_RETURNS );
            $process_key( TeamGameStats\Property::KEY_KICKOFF_TOUCHBACKS );
            $process_key( TeamGameStats\Property::KEY_KICKOFFS );
            $process_key( TeamGameStats\Property::KEY_KICKOFFS_IN_END_ZONE );
            $process_key( TeamGameStats\Property::KEY_OFFENSIVE_PLAYS );
            $process_key( TeamGameStats\Property::KEY_OFFENSIVE_YARDS );
            $process_key( TeamGameStats\Property::KEY_OFFENSIVE_YARDS_PER_PLAY );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_ASSISTED_TACKLES );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_BLOCKED_KICK_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_BLOCKED_KICK_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_BLOCKED_KICKS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_COMPLETION_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_EXTRA_POINT_KICKING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_EXTRA_POINT_KICKING_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_EXTRA_POINT_PASSING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_EXTRA_POINT_PASSING_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_EXTRA_POINT_RUSHING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_EXTRA_POINTS_RUSHING_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_EXTRA_POINTS_HAD_BLOCKED );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIELD_GOAL_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIELD_GOAL_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIELD_GOAL_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIELD_GOALS_HAD_BLOCKED );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIELD_GOALS_MADE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIRST_DOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIRST_DOWNS_BY_PASSING );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIRST_DOWNS_BY_PENALTY );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FIRST_DOWNS_BY_RUSHING );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FOURTH_DOWN_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FOURTH_DOWN_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FOURTH_DOWN_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FUMBLE_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FUMBLE_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FUMBLES );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FUMBLES_FORCED );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FUMBLES_LOST );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_FUMBLES_RECOVERED );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_GIVEAWAYS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_GOAL_TO_GO_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_GOAL_TO_GO_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_GOAL_TO_GO_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_INTERCEPTION_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_INTERCEPTION_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_INTERCEPTION_RETURNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_KICK_RETURN_LONG );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_KICK_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_KICK_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_KICK_RETURNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_KICKOFF_TOUCHBACKS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_KICKOFFS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_KICKOFFS_IN_END_ZONE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_OFFENSIVE_PLAYS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_OFFENSIVE_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_OFFENSIVE_YARDS_PER_PLAY );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSER_RATING );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSES_DEFENDED );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSING_COMPLETIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSING_DROPBACKS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSING_INTERCEPTIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSING_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSING_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSING_YARDS_PER_ATTEMPT );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PASSING_YARDS_PER_COMPLETION );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PENALTIES );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PENALTY_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNT_AVERAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNT_NET_AVERAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNT_NET_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNT_RETURN_LONG );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNT_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNT_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNT_RETURNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNT_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_PUNTS_HAD_BLOCKED );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_QUARTERBACK_HITS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_QUARTERBACK_HITS_DIFFERENTIAL );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_QUARTERBACK_HITS_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_QUARTERBACK_SACKS_DIFFERENTIAL );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_RED_ZONE_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_RED_ZONE_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_RED_ZONE_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_RUSHING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_RUSHING_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_RUSHING_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_RUSHING_YARDS_PER_ATTEMPT );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SACK_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SACKS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SAFETIES );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SCORE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SCORE_OVERTIME );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SCORE_QUARTER_1 );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SCORE_QUARTER_2 );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SCORE_QUARTER_3 );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SCORE_QUARTER_4 );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_SOLO_TACKLES );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TACKLES_FOR_LOSS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TACKLES_FOR_LOSS_DIFFERENTIAL );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TACKLES_FOR_LOSS_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TAKEAWAYS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_THIRD_DOWN_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_THIRD_DOWN_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_THIRD_DOWN_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TIME_OF_POSSESSION );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TIMES_SACKED );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TIMES_SACKED_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TIMES_SACKED_YARDS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TURNOVER_DIFFERENTIAL );
            $process_key( TeamGameStats\Property::KEY_OVER_UNDER );
            $process_key( TeamGameStats\Property::KEY_PASSER_RATING );
            $process_key( TeamGameStats\Property::KEY_PASSES_DEFENDED );
            $process_key( TeamGameStats\Property::KEY_PASSING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_PASSING_COMPLETION );
            $process_key( TeamGameStats\Property::KEY_PASSING_DROPBACKS );
            $process_key( TeamGameStats\Property::KEY_PASSING_INTERCEPTIONS );
            $process_key( TeamGameStats\Property::KEY_PASSING_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_PASSING_YARDS );
            $process_key( TeamGameStats\Property::KEY_PASSING_YARDS_PER_ATTEMPT );
            $process_key( TeamGameStats\Property::KEY_PASSING_YARDS_PER_COMPLETION );
            $process_key( TeamGameStats\Property::KEY_PENALTIES );
            $process_key( TeamGameStats\Property::KEY_PENALTY_YARDS );
            $process_key( TeamGameStats\Property::KEY_POINT_SPREAD );
            $process_key( TeamGameStats\Property::KEY_PUNT_AVERAGE );
            $process_key( TeamGameStats\Property::KEY_PUNT_NET_AVERAGE );
            $process_key( TeamGameStats\Property::KEY_PUNT_NET_YARDS );
            $process_key( TeamGameStats\Property::KEY_PUNT_RETURN_LONG );
            $process_key( TeamGameStats\Property::KEY_PUNT_RETURN_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_PUNT_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_PUNT_RETURNS );
            $process_key( TeamGameStats\Property::KEY_PUNT_YARDS );
            $process_key( TeamGameStats\Property::KEY_PUNTS );
            $process_key( TeamGameStats\Property::KEY_PUNTS_HAD_BLOCKED );
            $process_key( TeamGameStats\Property::KEY_QUARTERBACK_HITS );
            $process_key( TeamGameStats\Property::KEY_QUARTERBACK_HITS_DIFFERENTIAL );
            $process_key( TeamGameStats\Property::KEY_QUARTERBACK_HITS_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_QUARTERBACK_SACKS_DIFFERENTIAL );
            $process_key( TeamGameStats\Property::KEY_RED_ZONE_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_RED_ZONE_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_RED_ZONE_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_RETURN_YARDS );
            $process_key( TeamGameStats\Property::KEY_RUSHING_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_RUSHING_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_RUSHING_YARDS );
            $process_key( TeamGameStats\Property::KEY_RUSHING_YARDS_PER_ATTEMPT );
            $process_key( TeamGameStats\Property::KEY_SACK_YARDS );
            $process_key( TeamGameStats\Property::KEY_SACKS );
            $process_key( TeamGameStats\Property::KEY_SAFETIES );
            $process_key( TeamGameStats\Property::KEY_SCORE );
            $process_key( TeamGameStats\Property::KEY_SCORE_OVERTIME );
            $process_key( TeamGameStats\Property::KEY_SCORE_QUARTER_1 );
            $process_key( TeamGameStats\Property::KEY_SCORE_QUARTER_2 );
            $process_key( TeamGameStats\Property::KEY_SCORE_QUARTER_3 );
            $process_key( TeamGameStats\Property::KEY_SCORE_QUARTER_4 );
            $process_key( TeamGameStats\Property::KEY_SEASON );
            $process_key( TeamGameStats\Property::KEY_SEASON_TYPE );
            $process_key( TeamGameStats\Property::KEY_SOLO_TACKLES );
            $process_key( TeamGameStats\Property::KEY_TACKLES_FOR_LOSS );
            $process_key( TeamGameStats\Property::KEY_TACKELS_FOR_LOSS_DIFFERENTIAL );
            $process_key( TeamGameStats\Property::KEY_TACKLES_FOR_LOSS_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_TAKEAWAYS );
            $process_key( TeamGameStats\Property::KEY_TEAM );
            $process_key( TeamGameStats\Property::KEY_GAME_ID );
            $process_key( TeamGameStats\Property::KEY_TEAM_NAME );
            $process_key( TeamGameStats\Property::KEY_TEMPERATURE );
            $process_key( TeamGameStats\Property::KEY_THIRD_DOWN_ATTEMPTS );
            $process_key( TeamGameStats\Property::KEY_THIRD_DOWN_CONVERSIONS );
            $process_key( TeamGameStats\Property::KEY_THIRD_DOWN_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_TIME_OF_POSSESSION );
            $process_key( TeamGameStats\Property::KEY_TIMES_SACKED );
            $process_key( TeamGameStats\Property::KEY_TIMES_SACKED_PERCENTAGE );
            $process_key( TeamGameStats\Property::KEY_TIMES_SACKED_YARDS );
            $process_key( TeamGameStats\Property::KEY_TOTAL_SCORE );
            $process_key( TeamGameStats\Property::KEY_TOUCHDOWNS );
            $process_key( TeamGameStats\Property::KEY_TURNOVER_DIFFERENTIAL );
            $process_key( TeamGameStats\Property::KEY_WIND_SPEED );
            $process_key( TeamGameStats\Property::KEY_DATE );
            $process_key( TeamGameStats\Property::KEY_DAY_OF_WEEK );
            $process_key( TeamGameStats\Property::KEY_HOME_OR_AWAY );
            $process_key( TeamGameStats\Property::KEY_IS_GAME_OVER );
            $process_key( TeamGameStats\Property::KEY_OPPONENT );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TIME_OF_POSSESSION_MINUTES );
            $process_key( TeamGameStats\Property::KEY_OPPONENT_TIME_OF_POSSESSION_SECONDS );
            $process_key( TeamGameStats\Property::KEY_PLAYING_SURFACE );
            $process_key( TeamGameStats\Property::KEY_STADIUM );
            $process_key( TeamGameStats\Property::KEY_TIME_OF_POSSESSION_MINUTES );
            $process_key( TeamGameStats\Property::KEY_TIME_OF_POSSESSION_SECONDS );
            $process_key( TeamGameStats\Property::KEY_WEEK );

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_team_game_stats_keys );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for 2013, Week 17 TeamGameStats
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function test2013REGWeek17TeamGameStatsInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->TeamGameStats(['Season' => '2013REG', 'Week' => '17']);
    }
}
