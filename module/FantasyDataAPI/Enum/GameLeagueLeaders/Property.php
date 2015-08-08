<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Enum\GameLeagueLeaders;


class Property
{
    const KEY_D365_FANTASY_POINTS = 'CustomD365FantasyPoints';
    const KEY_SCORING_DETAILS = 'ScoringDetails';
    const KEY_GAME_KEY  =   'GameKey';  /** new */
    const KEY_PLAYER_ID = 'PlayerID';
    const KEY_SEASON_TYPE = 'SeasonType';
    const KEY_SEASON = 'Season';
    const KEY_GAME_DATE =   'GameDate'; /** new */
    const KEY_WEEK  =   'Week';
    const KEY_TEAM = 'Team';
    const KEY_OPPONENT  =   'Opponent'; /** new */
    const KEY_HOME_OR_AWAY  =   'HomeOrAway'; /** new */
    const KEY_NUMBER = 'Number';
    const KEY_NAME = 'Name';
    const KEY_POSITION = 'Position';
    const KEY_POSITION_CATEGORY = 'PositionCategory';
    const KEY_ACTIVATED = 'Activated';
    const KEY_PLAYED = 'Played';
    const KEY_STARTED = 'Started';
    const KEY_PASSING_ATTEMPTS = 'PassingAttempts';
    const KEY_PASSING_COMPLETIONS = 'PassingCompletions';
    const KEY_PASSING_YARDS = 'PassingYards';
    const KEY_PASSING_COMPLETION_PERCENTAGE = 'PassingCompletionPercentage';
    const KEY_PASSING_YARDS_PER_ATTEMPT = 'PassingYardsPerAttempt';
    const KEY_PASSING_YARDS_PER_COMPLETION = 'PassingYardsPerCompletion';
    const KEY_PASSING_TOUCHDOWNS = 'PassingTouchdowns';
    const KEY_PASSING_INTERCEPTIONS = 'PassingInterceptions';
    const KEY_PASSING_RATING = 'PassingRating';
    const KEY_PASSING_LONG = 'PassingLong';
    const KEY_PASSING_SACKS = 'PassingSacks';
    const KEY_PASSING_SACK_YARDS = 'PassingSackYards';
    const KEY_RUSHING_ATTEMPTS = 'RushingAttempts';
    const KEY_RUSHING_YARDS = 'RushingYards';
    const KEY_RUSHING_YARDS_PER_ATTEMPT = 'RushingYardsPerAttempt';
    const KEY_RUSHING_TOUCHDOWNS = 'RushingTouchdowns';
    const KEY_RUSHING_LONG = 'RushingLong';
    const KEY_RECEIVING_TARGETS = 'ReceivingTargets';
    const KEY_RECEPTIONS = 'Receptions';
    const KEY_RECEIVING_YARDS = 'ReceivingYards';
    const KEY_RECEIVING_YARDS_PER_RECEPTION = 'ReceivingYardsPerReception';
    const KEY_RECEIVING_TOUCHDOWNS = 'ReceivingTouchdowns';
    const KEY_RECEIVING_LONG = 'ReceivingLong';
    const KEY_FUMBLES = 'Fumbles';
    const KEY_FUMBLES_LOST = 'FumblesLost';
    const KEY_PUNT_RETURNS = 'PuntReturns';
    const KEY_PUNT_RETURN_YARDS = 'PuntReturnYards';
    const KEY_PUNT_RETURN_YARDS_PER_ATTEMPT = 'PuntReturnYardsPerAttempt';
    const KEY_PUNT_RETURN_TOUCHDOWNS = 'PuntReturnTouchdowns';
    const KEY_PUNT_RETURN_LONG = 'PuntReturnLong';
    const KEY_KICK_RETURNS = 'KickReturns';
    const KEY_KICK_RETURN_YARDS = 'KickReturnYards';
    const KEY_KICK_RETURN_YARDS_PER_ATTEMPT = 'KickReturnYardsPerAttempt';
    const KEY_KICK_RETURN_TOUCHDOWNS = 'KickReturnTouchdowns';
    const KEY_KICK_RETURN_LONG = 'KickReturnLong';
    const KEY_SOLO_TACKLES = 'SoloTackles';
    const KEY_ASSISTED_TACKLES = 'AssistedTackles';
    const KEY_TACKLES_FOR_LOSS = 'TacklesForLoss';
    const KEY_SACKS = 'Sacks';
    const KEY_SACK_YARDS = 'SackYards';
    const KEY_QUARTERBACK_HITS = 'QuarterbackHits';
    const KEY_PASSES_DEFENDED = 'PassesDefended';
    const KEY_FUMBLES_FORCED = 'FumblesForced';
    const KEY_FUMBLES_RECOVERED = 'FumblesRecovered';
    const KEY_FUMBLE_RETURN_YARDS = 'FumbleReturnYards';
    const KEY_FUMBLE_RETURN_TOUCHDOWNS = 'FumbleReturnTouchdowns';
    const KEY_INTERCEPTIONS = 'Interceptions';
    const KEY_INTERCEPTION_RETURN_YARDS = 'InterceptionReturnYards';
    const KEY_INTERCEPTION_RETURN_TOUCHDOWNS = 'InterceptionReturnTouchdowns';
    const KEY_BLOCKED_KICKS = 'BlockedKicks';
    const KEY_SPECIAL_TEAMS_SOLO_TACKLES = 'SpecialTeamsSoloTackles';
    const KEY_SPECIAL_TEAMS_ASSISTED_TACKLES = 'SpecialTeamsAssistedTackles';
    const KEY_MISC_SOLO_TACKLES = 'MiscSoloTackles';
    const KEY_MISC_ASSISTED_TACKLES = 'MiscAssistedTackles';
    const KEY_PUNTS = 'Punts';
    const KEY_PUNT_YARDS = 'PuntYards';
    const KEY_PUNT_AVERAGE = 'PuntAverage';
    const KEY_FIELD_GOALS_ATTEMPTED = 'FieldGoalsAttempted';
    const KEY_FIELD_GOALS_MADE = 'FieldGoalsMade';
    const KEY_FIELD_GOALS_LONGEST_MADE = 'FieldGoalsLongestMade';
    const KEY_EXTRA_POINTS_MADE = 'ExtraPointsMade';
    const KEY_TWO_POINT_CONVERSION_PASSES = 'TwoPointConversionPasses';
    const KEY_TWO_POINT_CONVERSION_RUNS = 'TwoPointConversionRuns';
    const KEY_TWO_POINT_CONVERSION_RECEPTIONS = 'TwoPointConversionReceptions';
    const KEY_FANTASY_POINTS = 'FantasyPoints';
    const KEY_FANTASY_POINTS_PPR = 'FantasyPointsPPR';
    const KEY_RECEPTION_PERCENTAGE = 'ReceptionPercentage';
    const KEY_RECEIVING_YARDS_PER_TARGET = 'ReceivingYardsPerTarget';
    const KEY_TACKLES = 'Tackles';
    const KEY_OFFENSIVE_TOUCHDOWNS = 'OffensiveTouchdowns';
    const KEY_DEFENSIVE_TOUCHDOWNS = 'DefensiveTouchdowns';
    const KEY_SPECIAL_TEAMS_TOUCHDOWNS = 'SpecialTeamsTouchdowns';
    const KEY_TOUCHDOWNS = 'Touchdowns';
    const KEY_FANTASY_POSITION = 'FantasyPosition';
    const KEY_FIELD_GOAL_PERCENTAGE = 'FieldGoalPercentage';
    const KEY_PLAYER_GAME_ID    =   'PlayerGameID'; /** new */
    const KEY_FUMBLES_OWN_RECOVERIES = 'FumblesOwnRecoveries';
    const KEY_FUMBLES_OUT_OF_BOUNDS = 'FumblesOutOfBounds';
    const KEY_KICK_RETURN_FAIR_CATCHES = 'KickReturnFairCatches';
    const KEY_PUNT_RETURN_FAIR_CATCHES = 'PuntReturnFairCatches';
    const KEY_PUNT_TOUCHBACKS = 'PuntTouchbacks';
    const KEY_PUNT_INSIDE_20 = 'PuntInside20';
    const KEY_PUNT_NET_AVERAGE = 'PuntNetAverage';
    const KEY_EXTRA_POINTS_ATTEMPTED = 'ExtraPointsAttempted';
    const KEY_BLOCKED_KICK_RETURN_TOUCHDOWNS = 'BlockedKickReturnTouchdowns';
    const KEY_FIELD_GOAL_RETURN_TOUCHDOWNS = 'FieldGoalReturnTouchdowns';
    const KEY_SAFETIES = 'Safeties';
    const KEY_FIELD_GOALS_HAD_BLOCKED = 'FieldGoalsHadBlocked';
    const KEY_PUNTS_HAD_BLOCKED = 'PuntsHadBlocked';
    const KEY_EXTRA_POINTS_HAD_BLOCKED = 'ExtraPointsHadBlocked';
    const KEY_PUNT_LONG = 'PuntLong';
    const KEY_BLOCKED_KICK_RETURN_YARDS = 'BlockedKickReturnYards';
    const KEY_FIELD_GOAL_RETURN_YARDS = 'FieldGoalReturnYards';
    const KEY_PUNT_NET_YARDS = 'PuntNetYards';
    const KEY_SPECIAL_TEAMS_FUMBLES_FORCED = 'SpecialTeamsFumblesForced';
    const KEY_SPECIAL_TEAMS_FUMBLES_RECOVERED = 'SpecialTeamsFumblesRecovered';
    const KEY_MISC_FUMBLES_FORCED = 'MiscFumblesForced';
    const KEY_MISC_FUMBLES_RECOVERED = 'MiscFumblesRecovered';
    const KEY_SHORT_NAME = 'ShortName';
    const KEY_PLAYING_SURFACE = 'PlayingSurface'; /** new */
    const KEY_IS_GAME_OVER = 'IsGameOver'; /** new */
    const KEY_SAFETIES_ALLOWED = 'SafetiesAllowed';
    const KEY_STADIUM = 'Stadium'; /** new */
    const KEY_TEMPERATURE = 'Temperature';
    const KEY_HUMIDITY = 'Humidity';
    const KEY_WINDSPEED = 'WindSpeed';
    const KEY_FAN_DUEL_SALARY = 'FanDuelSalary'; /** new */
    const KEY_DRAFT_KINGS_SALARY = 'DraftKingsSalary'; /** new */
    const KEY_FANTASY_DATA_SALARY = 'FantasyDataSalary'; /** new */
    const KEY_OFFENSIVE_SNAPS_PLAYED = 'OffensiveSnapsPlayed';
    const KEY_DEFENSIVE_SNAPS_PLAYED = 'DefensiveSnapsPlayed';
    const KEY_SPECIAL_TEAMS_SNAPS_PLAYED = 'SpecialTeamsSnapsPlayed';
    const KEY_OFFENSIVE_TEAM_SNAPS = 'OffensiveTeamSnaps';
    const KEY_DEFENSIVE_TEAM_SNAPS = 'DefensiveTeamSnaps';
    const KEY_SPECIAL_TEAMS_TEAM_SNAPS= 'SpecialTeamsTeamSnaps';
    const KEY_VICTIV_SALARY = 'VictivSalary'; /** new */
}