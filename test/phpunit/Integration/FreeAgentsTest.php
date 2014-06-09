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

use FantasyDataAPI\Enum\Players;
use FantasyDataAPI\Enum\PlayerNews;
use FantasyDataAPI\Enum\PlayerSeason;

class FreeAgentsTest extends PHPUnit_Framework_TestCase
{

    /**
     * Given: A developer API key
     * When: API is queried for Free Agents
     * Then: Expect a 200 response with an array entries that each contain Players, PlayerNews and PlayerSeason info
     */
    public function testFreeAgentsSuccessfulResponse()
    {
        $client = new DebugClient($_SERVER['FANTASY_DATA_API_KEY'], Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $result = $client->FreeAgents([]);

        $response = $client->mHistory->getLastResponse();

        $this->assertEquals('200', $response->getStatusCode());

        /** we expect a non-empty array of players */
        $this->assertNotEmpty( $result );

        $check_players = function ( $pPlayers )
        {
            /** we expect 40 stats */
            $this->assertCount( 40, $pPlayers );

            $cloned_array = $pPlayers;

            /** this function helps us assure that we're not missing any keys in the Enum list */
            $process_key = function ( $pKey ) use ( $pPlayers, &$cloned_array )
            {
                $this->assertArrayHasKey( $pKey, $pPlayers );
                unset( $cloned_array[$pKey] );
            };

            /** test all the keys */
            $process_key( Players\Property::KEY_ACTIVE );
            $process_key( Players\Property::KEY_AGE );
            $process_key( Players\Property::KEY_AVERAGE_DRAFT_POSITION );
            $process_key( Players\Property::KEY_BIRTH_DATE );
            $process_key( Players\Property::KEY_BIRTH_DATE_STRING );
            $process_key( Players\Property::KEY_BYE_WEEK );
            $process_key( Players\Property::KEY_COLLEGE );
            $process_key( Players\Property::KEY_COLLEGE_DRAFT_PICK );
            $process_key( Players\Property::KEY_COLLEGE_DRAFT_ROUND );
            $process_key( Players\Property::KEY_COLLEGE_DRAFT_TEAM );
            $process_key( Players\Property::KEY_COLLEGE_DRAFT_YEAR );
            $process_key( Players\Property::KEY_CURRENT_TEAM );
            $process_key( Players\Property::KEY_DEPTH_DISPLAY_ORDER );
            $process_key( Players\Property::KEY_DEPTH_ORDER );
            $process_key( Players\Property::KEY_DEPTH_POSITION );
            $process_key( Players\Property::KEY_DEPTH_POSITION_CATEGORY );
            $process_key( Players\Property::KEY_EXPERIENCE );
            $process_key( Players\Property::KEY_EXPERIENCE_STRING );
            $process_key( Players\Property::KEY_FANTASY_POSITION );
            $process_key( Players\Property::KEY_FIRST_NAME );
            $process_key( Players\Property::KEY_HEIGHT );
            $process_key( Players\Property::KEY_HEIGHT_FEET );
            $process_key( Players\Property::KEY_HEIGHT_INCHES );
            $process_key( Players\Property::KEY_INJURY_STATUS );
            $process_key( Players\Property::KEY_IS_UNDRAFTED_FREE_AGENT );
            $process_key( Players\Property::KEY_LAST_NAME );
            $process_key( Players\Property::KEY_LATEST_NEWS );
            $process_key( Players\Property::KEY_NAME );
            $process_key( Players\Property::KEY_NUMBER );
            $process_key( Players\Property::KEY_PHOTO_URL );
            $process_key( Players\Property::KEY_PLAYER_ID );
            $process_key( Players\Property::KEY_PLAYER_SEASON );
            $process_key( Players\Property::KEY_POSITION );
            $process_key( Players\Property::KEY_POSITION_CATEGORY );
            $process_key( Players\Property::KEY_SHORT_NAME );
            $process_key( Players\Property::KEY_STATUS );
            $process_key( Players\Property::KEY_TEAM );
            $process_key( Players\Property::KEY_UPCOMING_GAME_OPPONENT );
            $process_key( Players\Property::KEY_UPCOMING_GAME_WEEK );
            $process_key( Players\Property::KEY_WEIGHT );

            if ( false == empty( $pPlayers[Players\Property::KEY_LATEST_NEWS]) )
            {
                foreach ( $pPlayers[Players\Property::KEY_LATEST_NEWS] as $news )
                {
                    $cloned_news = $news;

                    /** we expect 9 keys */
                    $this->assertCount( 9, $news );

                    $process_player_news = function ( $pNewsKey ) use ( &$cloned_news )
                    {
                        $this->assertArrayHasKey( $pNewsKey, $cloned_news );
                        unset( $cloned_news[$pNewsKey] );
                    };

                    $process_player_news( PlayerNews\Property::KEY_CONTENT );
                    $process_player_news( PlayerNews\Property::KEY_NEWS_ID );
                    $process_player_news( PlayerNews\Property::KEY_PLAYER_ID );
                    $process_player_news( PlayerNews\Property::KEY_SOURCE );
                    $process_player_news( PlayerNews\Property::KEY_TEAM );
                    $process_player_news( PlayerNews\Property::KEY_TERMS_OF_USE );
                    $process_player_news( PlayerNews\Property::KEY_TITLE );
                    $process_player_news( PlayerNews\Property::KEY_UPDATED );
                    $process_player_news( PlayerNews\Property::KEY_URL );

                    $this->assertEmpty( $cloned_news );
                }
            }

            if ( false == empty( $pPlayers[Players\Property::KEY_PLAYER_SEASON]) )
            {
                $cloned_season = $pPlayers[Players\Property::KEY_PLAYER_SEASON];

                /** we expect 116 keys */
                $this->assertCount( 116, $cloned_season );

                $process_player_season = function ( $pSeasonKey ) use ( &$cloned_season )
                {
                    $this->assertArrayHasKey( $pSeasonKey, $cloned_season );
                    unset( $cloned_season[$pSeasonKey] );
                };

                $process_player_season( PlayerSeason\Property::KEY_ACTIVATED );
                $process_player_season( PlayerSeason\Property::KEY_ASSISTED_TACKLES );
                $process_player_season( PlayerSeason\Property::KEY_BLOCKED_KICK_RETURN_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_BLOCKED_KICK_RETURN_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_BLOCKED_KICKS );
                $process_player_season( PlayerSeason\Property::KEY_D365_FANTASY_POINTS );
                $process_player_season( PlayerSeason\Property::KEY_DEFENSIVE_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_EXTRA_POINTS_ATTEMPTED );
                $process_player_season( PlayerSeason\Property::KEY_EXTRA_POINTS_HAD_BLOCKED );
                $process_player_season( PlayerSeason\Property::KEY_EXTRA_POINTS_MADE );
                $process_player_season( PlayerSeason\Property::KEY_FANTASY_POINTS );
                $process_player_season( PlayerSeason\Property::KEY_FANTASY_POINTS_PPR );
                $process_player_season( PlayerSeason\Property::KEY_FANTASY_POSITION );
                $process_player_season( PlayerSeason\Property::KEY_FIELD_GOAL_PERCENTAGE );
                $process_player_season( PlayerSeason\Property::KEY_FIELD_GOAL_RETURN_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_FIELD_GOAL_RETURN_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_FIELD_GOALS_ATTEMPTED );
                $process_player_season( PlayerSeason\Property::KEY_FIELD_GOALS_HAD_BLOCKED );
                $process_player_season( PlayerSeason\Property::KEY_FIELD_GOALS_LONGEST_MADE );
                $process_player_season( PlayerSeason\Property::KEY_FIELD_GOALS_MADE );
                $process_player_season( PlayerSeason\Property::KEY_FUMBLE_RETURN_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_FUMBLE_RETURN_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_FUMBLES );
                $process_player_season( PlayerSeason\Property::KEY_FUMBLES_FORCED );
                $process_player_season( PlayerSeason\Property::KEY_FUMBLES_LOST );
                $process_player_season( PlayerSeason\Property::KEY_FUMBLES_OUT_OF_BOUNDS );
                $process_player_season( PlayerSeason\Property::KEY_FUMBLES_OWN_RECOVERIES );
                $process_player_season( PlayerSeason\Property::KEY_FUMBLES_RECOVERED );
                $process_player_season( PlayerSeason\Property::KEY_HUMIDITY );
                $process_player_season( PlayerSeason\Property::KEY_INTERCEPTION_RETURN_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_INTERCEPTION_RETURN_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_INTERCEPTIONS );
                $process_player_season( PlayerSeason\Property::KEY_KICK_RETURN_FAIR_CATCHES );
                $process_player_season( PlayerSeason\Property::KEY_KICK_RETURN_LONG );
                $process_player_season( PlayerSeason\Property::KEY_KICK_RETURN_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_KICK_RETURN_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_KICK_RETURN_YARDS_PER_ATTEMPT );
                $process_player_season( PlayerSeason\Property::KEY_KICK_RETURNS );
                $process_player_season( PlayerSeason\Property::KEY_MISC_ASSISTED_TACKLES );
                $process_player_season( PlayerSeason\Property::KEY_MISC_FUMBLES_FORCED );
                $process_player_season( PlayerSeason\Property::KEY_MISC_FUMBLES_RECOVERED );
                $process_player_season( PlayerSeason\Property::KEY_MISC_SOLO_TACKLES );
                $process_player_season( PlayerSeason\Property::KEY_NAME );
                $process_player_season( PlayerSeason\Property::KEY_NUMBER );
                $process_player_season( PlayerSeason\Property::KEY_OFFENSIVE_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_PASSES_DEFENDED );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_ATTEMPTS );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_COMPLETION_PERCENTAGE );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_COMPLETIONS );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_INTERCEPTIONS );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_LONG );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_RATING );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_SACK_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_SACKS );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_YARDS_PER_ATTEMPT );
                $process_player_season( PlayerSeason\Property::KEY_PASSING_YARDS_PER_COMPLETION );
                $process_player_season( PlayerSeason\Property::KEY_PLAYED );
                $process_player_season( PlayerSeason\Property::KEY_PLAYER_ID );
                $process_player_season( PlayerSeason\Property::KEY_PLAYER_SEASON_ID );
                $process_player_season( PlayerSeason\Property::KEY_POSITION );
                $process_player_season( PlayerSeason\Property::KEY_POSITION_CATEGORY );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_AVERAGE );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_INSIDE_20 );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_LOING );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_NET_AVERAGE );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_NET_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_RETURN_FAIR_CATCHES );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_RETURN_LONG );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_RETURN_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_RETURN_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_RETURN_YARDS_PER_ATTEMPT );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_RETURNS );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_TOUCHBACKS );
                $process_player_season( PlayerSeason\Property::KEY_PUNT_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_PUNTS );
                $process_player_season( PlayerSeason\Property::KEY_PUNTS_HAD_BLOCKED );
                $process_player_season( PlayerSeason\Property::KEY_QUARTERBACK_HITS );
                $process_player_season( PlayerSeason\Property::KEY_RECEIVING_LONG );
                $process_player_season( PlayerSeason\Property::KEY_RECEIVING_TARGETS );
                $process_player_season( PlayerSeason\Property::KEY_RECEIVING_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_RECEIVING_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_RECEIVING_YARDS_PER_RECEPTION );
                $process_player_season( PlayerSeason\Property::KEY_RECEIVING_YARDS_PER_TARGET );
                $process_player_season( PlayerSeason\Property::KEY_RECEPTION_PERCENTAGE );
                $process_player_season( PlayerSeason\Property::KEY_RECEPTIONS );
                $process_player_season( PlayerSeason\Property::KEY_RUSHING_ATTEMPTS );
                $process_player_season( PlayerSeason\Property::KEY_RUSHING_LONG );
                $process_player_season( PlayerSeason\Property::KEY_RUSHING_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_RUSHING_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_RUSHING_YARDS_PER_ATTEMPT );
                $process_player_season( PlayerSeason\Property::KEY_SACK_YARDS );
                $process_player_season( PlayerSeason\Property::KEY_SACKS );
                $process_player_season( PlayerSeason\Property::KEY_SAFETIES );
                $process_player_season( PlayerSeason\Property::KEY_SAFETIES_ALLOWED );
                $process_player_season( PlayerSeason\Property::KEY_SCORING_DETAILS );
                $process_player_season( PlayerSeason\Property::KEY_SEASON );
                $process_player_season( PlayerSeason\Property::KEY_SEASON_TYPE );
                $process_player_season( PlayerSeason\Property::KEY_SHORT_NAME );
                $process_player_season( PlayerSeason\Property::KEY_SOLO_TACKLES );
                $process_player_season( PlayerSeason\Property::KEY_SPECIAL_TEAMS_ASSISTED_TACKLES );
                $process_player_season( PlayerSeason\Property::KEY_SPECIAL_TEAMS_FUMBLES_FORCED );
                $process_player_season( PlayerSeason\Property::KEY_SPECIAL_TEAMS_FUMBLES_RECOVERED );
                $process_player_season( PlayerSeason\Property::KEY_SPECIAL_TEAMS_SOLO_TACKLES );
                $process_player_season( PlayerSeason\Property::KEY_SPECIAL_TEAMS_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_STARTED );
                $process_player_season( PlayerSeason\Property::KEY_TACKLES );
                $process_player_season( PlayerSeason\Property::KEY_TACKLES_FOR_LOSS );
                $process_player_season( PlayerSeason\Property::KEY_TEAM );
                $process_player_season( PlayerSeason\Property::KEY_TEMPERATURE );
                $process_player_season( PlayerSeason\Property::KEY_TOUCHDOWNS );
                $process_player_season( PlayerSeason\Property::KEY_TWO_POINT_CONVERSION_PASSES );
                $process_player_season( PlayerSeason\Property::KEY_TWO_POINT_CONVERSION_RECEPTIONS );
                $process_player_season( PlayerSeason\Property::KEY_TWO_POINT_CONVERSION_RUNS );
                $process_player_season( PlayerSeason\Property::KEY_WINDSPEED );

                $this->assertEmpty( $cloned_season );
            }

            $this->assertEmpty( $cloned_array );
        };

        $stats = $result->toArray();

        array_walk( $stats, $check_players );
    }

    /**
     * Given: An invalid developer API key
     * When: API is queried for Free Agents
     * Then: Expect a 401 response in the form of a Guzzle CommandClientException
     *
     * @expectedException \GuzzleHttp\Command\Exception\CommandClientException
     */
    public function testFreeAgentsInvalidAPIKey()
    {
        $client = new DebugClient('invalid_api_key', Subscription::KEY_DEVELOPER);

        /** @var \GuzzleHttp\Command\Model $result */
        $client->FreeAgents([]);
    }
}
