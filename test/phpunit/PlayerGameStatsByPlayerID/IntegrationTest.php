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

use FantasyDataAPI\Enum\PlayerGame;
use FantasyDataAPI\Enum\ScoringDetails;

class PlayerGameStatsByPlayerIDTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for PlayerGameStatsByPlayerID, Season 2013REG, Week 13, PlayerID 10974
     * Then: Expect a 200 response with an array entries that each contain PlayerGame and ScoringDetails info
     *
     * @group Integration
     * @medium
     */
    public function testSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->PlayerGameStatsByPlayerID(['Season' => '2013REG', 'Week' => '13', 'PlayerID' => '10974']);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        $check_player_game = function ( $pPlayerGame )
        {
            /** we expect 124 stats */
            $this->assertCount( 124, $pPlayerGame );

            $cloned_array = $pPlayerGame;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pPlayerGame, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pPlayerGame );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( PlayerGame\Property::KEY_ACTIVATED );
            $process_key( PlayerGame\Property::KEY_ASSISTED_TACKLES );
            $process_key( PlayerGame\Property::KEY_BLOCKED_KICK_RETURN_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_BLOCKED_KICK_RETURN_YARDS );
            $process_key( PlayerGame\Property::KEY_BLOCKED_KICKS );
            $process_key( PlayerGame\Property::KEY_CUSTOM_D365_FANTASY_POINTS );
            $process_key( PlayerGame\Property::KEY_DEFENSIVE_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_EXTRA_POINTS_ATTEMPTED );
            $process_key( PlayerGame\Property::KEY_EXTRA_POINTS_HAD_BLOCKED );
            $process_key( PlayerGame\Property::KEY_EXTRA_POINTS_MADE );
            $process_key( PlayerGame\Property::KEY_FANTASY_POINTS );
            $process_key( PlayerGame\Property::KEY_FANTASY_POINTS_PPR );
            $process_key( PlayerGame\Property::KEY_FANTASY_POSITION );
            $process_key( PlayerGame\Property::KEY_FIELD_GOAL_PERCENTAGE );
            $process_key( PlayerGame\Property::KEY_FIELD_GOAL_RETURN_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_FIELD_GOAL_RETURN_YARDS );
            $process_key( PlayerGame\Property::KEY_FIELD_GOALS_ATTEMPTED );
            $process_key( PlayerGame\Property::KEY_FIELD_GOALS_HAD_BLOCKED );
            $process_key( PlayerGame\Property::KEY_FIELD_GOALS_LONGEST_MADE );
            $process_key( PlayerGame\Property::KEY_FIELD_GOALS_MADE );
            $process_key( PlayerGame\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_FUMBLE_RETURN_YARDS );
            $process_key( PlayerGame\Property::KEY_FUMBLES );
            $process_key( PlayerGame\Property::KEY_FUMBLES_FORCED );
            $process_key( PlayerGame\Property::KEY_FUMBLES_LOST );
            $process_key( PlayerGame\Property::KEY_FUMBLES_OUT_OF_BOUNDS );
            $process_key( PlayerGame\Property::KEY_FUMBLES_OWN_RECOVERIES );
            $process_key( PlayerGame\Property::KEY_FUMBLES_RECOVERED );
            $process_key( PlayerGame\Property::KEY_GAME_DATE );
            $process_key( PlayerGame\Property::KEY_GAME_KEY );
            $process_key( PlayerGame\Property::KEY_HOME_OR_AWAY );
            $process_key( PlayerGame\Property::KEY_HUMIDITY );
            $process_key( PlayerGame\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_INTERCEPTION_RETURN_YARDS );
            $process_key( PlayerGame\Property::KEY_INTERCEPTIONS );
            $process_key( PlayerGame\Property::KEY_IS_GAME_OVER );
            $process_key( PlayerGame\Property::KEY_KICK_RETURN_FAIR_CATCHES );
            $process_key( PlayerGame\Property::KEY_KICK_RETURN_LONG );
            $process_key( PlayerGame\Property::KEY_KICK_RETURN_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_KICK_RETURN_YARDS );
            $process_key( PlayerGame\Property::KEY_KICK_RETURN_YARDS_PER_ATTEMPT );
            $process_key( PlayerGame\Property::KEY_KICK_RETURNS );
            $process_key( PlayerGame\Property::KEY_MISC_ASSISTED_TACKLES );
            $process_key( PlayerGame\Property::KEY_MISC_FUMBLES_FORCED );
            $process_key( PlayerGame\Property::KEY_MISC_FUMBLES_RECOVERED );
            $process_key( PlayerGame\Property::KEY_MISC_SOLO_TACKLES );
            $process_key( PlayerGame\Property::KEY_NAME );
            $process_key( PlayerGame\Property::KEY_NUMBER );
            $process_key( PlayerGame\Property::KEY_OFFENSIVE_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_OPPONENT );
            $process_key( PlayerGame\Property::KEY_PASSES_DEFENDED );
            $process_key( PlayerGame\Property::KEY_PASSING_ATTEMPTS );
            $process_key( PlayerGame\Property::KEY_PASSING_COMPLETION_PERCENTAGE );
            $process_key( PlayerGame\Property::KEY_PASSING_COMPLETIONS );
            $process_key( PlayerGame\Property::KEY_PASSING_INTERCEPTIONS );
            $process_key( PlayerGame\Property::KEY_PASSING_LONG );
            $process_key( PlayerGame\Property::KEY_PASSING_RATING );
            $process_key( PlayerGame\Property::KEY_PASSING_SACK_YARDS );
            $process_key( PlayerGame\Property::KEY_PASSING_SACKS );
            $process_key( PlayerGame\Property::KEY_PASSING_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_PASSING_YARDS );
            $process_key( PlayerGame\Property::KEY_PASSING_YARDS_PER_ATTEMPT );
            $process_key( PlayerGame\Property::KEY_PASSING_YARDS_PER_COMPLETION );
            $process_key( PlayerGame\Property::KEY_PLAYED );
            $process_key( PlayerGame\Property::KEY_PLAYER_GAME_ID );
            $process_key( PlayerGame\Property::KEY_PLAYER_ID );
            $process_key( PlayerGame\Property::KEY_PLAYING_SURFACE );
            $process_key( PlayerGame\Property::KEY_POSITION );
            $process_key( PlayerGame\Property::KEY_POSITION_CATEGORY );
            $process_key( PlayerGame\Property::KEY_PUNT_AVERAGE );
            $process_key( PlayerGame\Property::KEY_PUNT_INSIDE_20 );
            $process_key( PlayerGame\Property::KEY_PUNT_LOING );
            $process_key( PlayerGame\Property::KEY_PUNT_NET_AVERAGE );
            $process_key( PlayerGame\Property::KEY_PUNT_NET_YARDS );
            $process_key( PlayerGame\Property::KEY_PUNT_RETURN_FAIR_CATCHES );
            $process_key( PlayerGame\Property::KEY_PUNT_RETURN_LONG );
            $process_key( PlayerGame\Property::KEY_PUNT_RETURN_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_PUNT_RETURN_YARDS );
            $process_key( PlayerGame\Property::KEY_PUNT_RETURN_YARDS_PER_ATTEMPT );
            $process_key( PlayerGame\Property::KEY_PUNT_RETURNS );
            $process_key( PlayerGame\Property::KEY_PUNT_TOUCHBACKS );
            $process_key( PlayerGame\Property::KEY_PUNT_YARDS );
            $process_key( PlayerGame\Property::KEY_PUNTS );
            $process_key( PlayerGame\Property::KEY_PUNTS_HAD_BLOCKED );
            $process_key( PlayerGame\Property::KEY_QUARTERBACK_HITS );
            $process_key( PlayerGame\Property::KEY_RECEIVING_LONG );
            $process_key( PlayerGame\Property::KEY_RECEIVING_TARGETS );
            $process_key( PlayerGame\Property::KEY_RECEIVING_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_RECEIVING_YARDS );
            $process_key( PlayerGame\Property::KEY_RECEIVING_YARDS_PER_RECEPTION );
            $process_key( PlayerGame\Property::KEY_RECEIVING_YARDS_PER_TARGET );
            $process_key( PlayerGame\Property::KEY_RECEPTION_PERCENTAGE );
            $process_key( PlayerGame\Property::KEY_RECEPTIONS );
            $process_key( PlayerGame\Property::KEY_RUSHING_ATTEMPTS );
            $process_key( PlayerGame\Property::KEY_RUSHING_LONG );
            $process_key( PlayerGame\Property::KEY_RUSHING_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_RUSHING_YARDS );
            $process_key( PlayerGame\Property::KEY_RUSHING_YARDS_PER_ATTEMPT );
            $process_key( PlayerGame\Property::KEY_SACK_YARDS );
            $process_key( PlayerGame\Property::KEY_SACKS );
            $process_key( PlayerGame\Property::KEY_SAFETIES );
            $process_key( PlayerGame\Property::KEY_SAFETIES_ALLOWED );
            $process_key( PlayerGame\Property::KEY_SCORING_DETAILS );
            $process_key( PlayerGame\Property::KEY_SEASON );
            $process_key( PlayerGame\Property::KEY_SEASON_TYPE );
            $process_key( PlayerGame\Property::KEY_SHORT_NAME );
            $process_key( PlayerGame\Property::KEY_SOLO_TACKLES );
            $process_key( PlayerGame\Property::KEY_SPECIAL_TEAMS_ASSISTED_TACKLES );
            $process_key( PlayerGame\Property::KEY_SPECIAL_TEAMS_FUMBLES_FORCED );
            $process_key( PlayerGame\Property::KEY_SPECIAL_TEAMS_FUMBLES_RECOVERED );
            $process_key( PlayerGame\Property::KEY_SPECIAL_TEAMS_SOLO_TACKLES );
            $process_key( PlayerGame\Property::KEY_SPECIAL_TEAMS_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_STADIUM );
            $process_key( PlayerGame\Property::KEY_STARTED );
            $process_key( PlayerGame\Property::KEY_TACKLES );
            $process_key( PlayerGame\Property::KEY_TACKLES_FOR_LOSS );
            $process_key( PlayerGame\Property::KEY_TEAM );
            $process_key( PlayerGame\Property::KEY_TEMPERATURE );
            $process_key( PlayerGame\Property::KEY_TOUCHDOWNS );
            $process_key( PlayerGame\Property::KEY_TWO_POINT_CONVERSION_PASSES );
            $process_key( PlayerGame\Property::KEY_TWO_POINT_CONVERSION_RECEPTIONS );
            $process_key( PlayerGame\Property::KEY_TWO_POINT_CONVERSION_RUNS );
            $process_key( PlayerGame\Property::KEY_WEEK );
            $process_key( PlayerGame\Property::KEY_WINDSPEED );

            if ( false == empty( $pPlayerGame[PlayerGame\Property::KEY_SCORING_DETAILS]) )
            {
                foreach ( $pPlayerGame[PlayerGame\Property::KEY_SCORING_DETAILS] as $scoring )
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
        $check_player_game( $stats );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for PlayerGameStatsByPlayerID, Season 2013REG, Week 13, PlayerID 10974
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
        $client->PlayerGameStatsByPlayerID(['Season' => '2013REG', 'Week' => '13', 'PlayerID' => '10974']);
    }
}
