<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Enum\Game;


class Property
{
    const KEY_AWAY_ASSISTED_TACKLES = 'AwayAssistedTackles';
    const KEY_AWAY_BLOCKED_KICK_RETURN_TOUCHDOWNS = 'AwayBlockedKickReturnTouchdowns';
    const KEY_AWAY_BLOCKED_KICK_RETURN_YARDS = 'AwayBlockedKickReturnYards';
    const KEY_AWAY_BLOCKED_KICKS = 'AwayBlockedKicks';
    const KEY_AWAY_COMPLETION_PERCENTAGE = 'AwayCompletionPercentage';
    const KEY_AWAY_EXTRA_POINT_KICKING_ATTEMPTS = 'AwayExtraPointKickingAttempts';
    const KEY_AWAY_EXTRA_POINT_KICKING_CONVERSIONS = 'AwayExtraPointKickingConversions';
    const KEY_AWAY_EXTRA_POINT_PASSING_ATTEMPTS = 'AwayExtraPointPassingAttempts';
    const KEY_AWAY_EXTRA_POINT_PASSING_CONVERSIONS = 'AwayExtraPointPassingConversions';
    const KEY_AWAY_EXTRA_POINT_RUSHING_ATTEMPTS = 'AwayExtraPointRushingAttempts';
    const KEY_AWAY_EXTRA_POINT_RUSHING_CONVERSIONS = 'AwayExtraPointRushingConversions';
    const KEY_AWAY_EXTRA_POINTS_HAD_BLOCKED = 'AwayExtraPointsHadBlocked';
    const KEY_AWAY_FIELD_GOAL_ATTEMPTS = 'AwayFieldGoalAttempts';
    const KEY_AWAY_FIELD_GOAL_RETURN_TOUCHDOWNS = 'AwayFieldGoalReturnTouchdowns';
    const KEY_AWAY_FIELD_GOAL_RETURN_YARDS = 'AwayFieldGoalReturnYards';
    const KEY_AWAY_FIELD_GOALS_HAD_BLOCKED = 'AwayFieldGoalsHadBlocked';
    const KEY_AWAY_FIELD_GOALS_MADE = 'AwayFieldGoalsMade';
    const KEY_AWAY_FIRST_DOWNS = 'AwayFirstDowns';
    const KEY_AWAY_FIRST_DOWNS_BY_PASSING = 'AwayFirstDownsByPassing';
    const KEY_AWAY_FIRST_DOWNS_BY_PENALTY = 'AwayFirstDownsByPenalty';
    const KEY_AWAY_FIRST_DOWNS_BY_RUSHING = 'AwayFirstDownsByRushing';
    const KEY_AWAY_FOURTH_DOWN_ATTEMPTS = 'AwayFourthDownAttempts';
    const KEY_AWAY_FOURTH_DOWN_CONVERSIONS = 'AwayFourthDownConversions';
    const KEY_AWAY_FOURTH_DOWN_PERCENTAGE = 'AwayFourthDownPercentage';
    const KEY_AWAY_FUMBLE_RETURN_TOUCHDOWNS = 'AwayFumbleReturnTouchdowns';
    const KEY_AWAY_FUMBLE_RETURN_YARDS = 'AwayFumbleReturnYards';
    const KEY_AWAY_FUMBLES = 'AwayFumbles';
    const KEY_AWAY_FUMBLES_FORCED = 'AwayFumblesForced';
    const KEY_AWAY_FUMBLES_LOST = 'AwayFumblesLost';
    const KEY_AWAY_FUMBLES_RECOVERED = 'AwayFumblesRecovered';
    const KEY_AWAY_GIVEAWAYS = 'AwayGiveaways';
    const KEY_AWAY_GOAL_TO_GO_ATTEMPTS = 'AwayGoalToGoAttempts';
    const KEY_AWAY_GOAL_TO_GO_CONVERSIONS = 'AwayGoalToGoConversions';
    const KEY_AWAY_INTERCEPTION_RETURN_TOUCHDOWNS = 'AwayInterceptionReturnTouchdowns';
    const KEY_AWAY_INTERCEPTION_RETURN_YARDS = 'AwayInterceptionReturnYards';
    const KEY_AWAY_INTERCEPTION_RETURNS = 'AwayInterceptionReturns';
    const KEY_AWAY_KICK_RETURN_LONG = 'AwayKickReturnLong';
    const KEY_AWAY_KICK_RETURN_TOUCHDOWNS = 'AwayKickReturnTouchdowns';
    const KEY_AWAY_KICK_RETURN_YARDS = 'AwayKickReturnYards';
    const KEY_AWAY_KICK_RETURNS = 'AwayKickReturns';
    const KEY_AWAY_KICKOFF_TOUCHBACKS = 'AwayKickoffTouchbacks';
    const KEY_AWAY_KICKOFFS = 'AwayKickoffs';
    const KEY_AWAY_KICKOFFS_IN_END_ZONE = 'AwayKickoffsInEndZone';
    const KEY_AWAY_OFFENSIVE_PLAYS = 'AwayOffensivePlays';
    const KEY_AWAY_OFFENSIVE_YARDS = 'AwayOffensiveYards';
    const KEY_AWAY_OFFENSIVE_YARDS_PER_PLAY = 'AwayOffensiveYardsPerPlay';
    const KEY_AWAY_PASSER_RATING = 'AwayPasserRating';
    const KEY_AWAY_PASSES_DEFENDED = 'AwayPassesDefended';
    const KEY_AWAY_PASSING_ATTEMPTS = 'AwayPassingAttempts';
    const KEY_AWAY_PASSING_COMPLETIONS = 'AwayPassingCompletions';
    const KEY_AWAY_PASSING_INTERCEPTIONS = 'AwayPassingInterceptions';
    const KEY_AWAY_PASSING_TOUCHDOWNS = 'AwayPassingTouchdowns';
    const KEY_AWAY_PASSING_YARDS = 'AwayPassingYards';
    const KEY_AWAY_PASSING_YARDS_PER_ATTEMPT = 'AwayPassingYardsPerAttempt';
    const KEY_AWAY_PASSING_YARDS_PER_COMPLETION = 'AwayPassingYardsPerCompletion';
    const KEY_AWAY_PENALTIES = 'AwayPenalties';
    const KEY_AWAY_PENALTY_YARDS = 'AwayPenaltyYards';
    const KEY_AWAY_PUNT_AVERAGE = 'AwayPuntAverage';
    const KEY_AWAY_PUNT_NET_AVERAGE = 'AwayPuntNetAverage';
    const KEY_AWAY_PUNT_NET_YARDS = 'AwayPuntNetYards';
    const KEY_AWAY_PUNT_RETURN_LONG = 'AwayPuntReturnLong';
    const KEY_AWAY_PUNT_RETURN_TOUCHDOWNS = 'AwayPuntReturnTouchdowns';
    const KEY_AWAY_PUNT_RETURN_YARDS = 'AwayPuntReturnYards';
    const KEY_AWAY_PUNT_RETURNS = 'AwayPuntReturns';
    const KEY_AWAY_PUNT_YARDS = 'AwayPuntYards';
    const KEY_AWAY_PUNTS = 'AwayPunts';
    const KEY_AWAY_PUNTS_HAD_BLOCKED = 'AwayPuntsHadBlocked';
    const KEY_AWAY_QUARTERBACK_HITS = 'AwayQuarterbackHits';
    const KEY_AWAY_RED_ZONE_ATTEMPTS = 'AwayRedZoneAttempts';
    const KEY_AWAY_RED_ZONE_CONVERSIONS = 'AwayRedZoneConversions';
    const KEY_AWAY_RETURN_YARDS = 'AwayReturnYards';
    const KEY_AWAY_RUSHING_ATTEMPTS = 'AwayRushingAttempts';
    const KEY_AWAY_RUSHING_TOUCHDOWNS = 'AwayRushingTouchdowns';
    const KEY_AWAY_RUSHING_YARDS = 'AwayRushingYards';
    const KEY_AWAY_RUSHING_YARDS_PER_ATTEMPT = 'AwayRushingYardsPerAttempt';
    const KEY_AWAY_SACK_YARDS = 'AwaySackYards';
    const KEY_AWAY_SACKS = 'AwaySacks';
    const KEY_AWAY_SAFETIES = 'AwaySafeties';
    const KEY_AWAY_SCORE = 'AwayScore';
    const KEY_AWAY_SCORE_OVERTIME = 'AwayScoreOvertime';
    const KEY_AWAY_SCORE_QUARTER_FIRST = 'AwayScoreQuarter1';
    const KEY_AWAY_SCORE_QUARTER_SECOND = 'AwayScoreQuarter2';
    const KEY_AWAY_SCORE_QUARTER_THIRD = 'AwayScoreQuarter3';
    const KEY_AWAY_SCORE_QUARTER_FOURTH = 'AwayScoreQuarter4';
    const KEY_AWAY_SOLO_TACKLES = 'AwaySoloTackles';
    const KEY_AWAY_TACKLES_FOR_LOSS = 'AwayTacklesForLoss';
    const KEY_AWAY_TAKEAWAYS = 'AwayTakeaways';
    const KEY_AWAY_TEAM = 'AwayTeam';
    const KEY_AWAY_THIRD_DOWN_ATTEMPTS = 'AwayThirdDownAttempts';
    const KEY_AWAY_THIRD_DOWN_CONVERSIONS = 'AwayThirdDownConversions';
    const KEY_AWAY_THIRD_DOWN_PERCENTAGE = 'AwayThirdDownPercentage';
    const KEY_AWAY_TIME_OF_POSSESSION = 'AwayTimeOfPossession';
    const KEY_AWAY_TIMES_SACKED = 'AwayTimesSacked';
    const KEY_AWAY_TIMES_SACKED_YARDS = 'AwayTimesSackedYards';
    const KEY_AWAY_TOUCHDOWNS = 'AwayTouchdowns';
    const KEY_AWAY_TURNOVER_DIFFERENTIAL = 'AwayTurnoverDifferential';
    
    const KEY_DATE = 'Date';
    const KEY_GAME_ID = 'GameID';
    const KEY_GAME_KEY = 'GameKey';

    const KEY_HOME_ASSISTED_TACKLES = 'HomeAssistedTackles';
    const KEY_HOME_BLOCKED_KICK_RETURN_TOUCHDOWNS = 'HomeBlockedKickReturnTouchdowns';
    const KEY_HOME_BLOCKED_KICK_RETURN_YARDS = 'HomeBlockedKickReturnYards';
    const KEY_HOME_BLOCKED_KICKS = 'HomeBlockedKicks';
    const KEY_HOME_COMPLETION_PERCENTAGE = 'HomeCompletionPercentage';
    const KEY_HOME_EXTRA_POINT_KICKING_ATTEMPTS = 'HomeExtraPointKickingAttempts';
    const KEY_HOME_EXTRA_POINT_KICKING_CONVERSIONS = 'HomeExtraPointKickingConversions';
    const KEY_HOME_EXTRA_POINT_PASSING_ATTEMPTS = 'HomeExtraPointPassingAttempts';
    const KEY_HOME_EXTRA_POINT_PASSING_CONVERSIONS = 'HomeExtraPointPassingConversions';
    const KEY_HOME_EXTRA_POINT_RUSHING_ATTEMPTS = 'HomeExtraPointRushingAttempts';
    const KEY_HOME_EXTRA_POINT_RUSHING_CONVERSIONS = 'HomeExtraPointRushingConversions';
    const KEY_HOME_EXTRA_POINTS_HAD_BLOCKED = 'HomeExtraPointsHadBlocked';
    const KEY_HOME_FIELD_GOAL_ATTEMPTS = 'HomeFieldGoalAttempts';
    const KEY_HOME_FIELD_GOAL_RETURN_TOUCHDOWNS = 'HomeFieldGoalReturnTouchdowns';
    const KEY_HOME_FIELD_GOAL_RETURN_YARDS = 'HomeFieldGoalReturnYards';
    const KEY_HOME_FIELD_GOALS_HAD_BLOCKED = 'HomeFieldGoalsHadBlocked';
    const KEY_HOME_FIELD_GOALS_MADE = 'HomeFieldGoalsMade';
    const KEY_HOME_FIRST_DOWNS = 'HomeFirstDowns';
    const KEY_HOME_FIRST_DOWNS_BY_PASSING = 'HomeFirstDownsByPassing';
    const KEY_HOME_FIRST_DOWNS_BY_PENALTY = 'HomeFirstDownsByPenalty';
    const KEY_HOME_FIRST_DOWNS_BY_RUSHING = 'HomeFirstDownsByRushing';
    const KEY_HOME_FOURTH_DOWN_ATTEMPTS = 'HomeFourthDownAttempts';
    const KEY_HOME_FOURTH_DOWN_CONVERSIONS = 'HomeFourthDownConversions';
    const KEY_HOME_FOURTH_DOWN_PERCENTAGE = 'HomeFourthDownPercentage';
    const KEY_HOME_FUMBLE_RETURN_TOUCHDOWNS = 'HomeFumbleReturnTouchdowns';
    const KEY_HOME_FUMBLE_RETURN_YARDS = 'HomeFumbleReturnYards';
    const KEY_HOME_FUMBLES = 'HomeFumbles';
    const KEY_HOME_FUMBLES_FORCED = 'HomeFumblesForced';
    const KEY_HOME_FUMBLES_LOST = 'HomeFumblesLost';
    const KEY_HOME_FUMBLES_RECOVERED = 'HomeFumblesRecovered';
    const KEY_HOME_GIVEAWAYS = 'HomeGiveaways';
    const KEY_HOME_GOAL_TO_GO_ATTEMPTS = 'HomeGoalToGoAttempts';
    const KEY_HOME_GOAL_TO_GO_CONVERSIONS = 'HomeGoalToGoConversions';
    const KEY_HOME_INTERCEPTION_RETURN_TOUCHDOWNS = 'HomeInterceptionReturnTouchdowns';
    const KEY_HOME_INTERCEPTION_RETURN_YARDS = 'HomeInterceptionReturnYards';
    const KEY_HOME_INTERCEPTION_RETURNS = 'HomeInterceptionReturns';
    const KEY_HOME_KICK_RETURN_LONG = 'HomeKickReturnLong';
    const KEY_HOME_KICK_RETURN_TOUCHDOWNS = 'HomeKickReturnTouchdowns';
    const KEY_HOME_KICK_RETURN_YARDS = 'HomeKickReturnYards';
    const KEY_HOME_KICK_RETURNS = 'HomeKickReturns';
    const KEY_HOME_KICKOFF_TOUCHBACKS = 'HomeKickoffTouchbacks';
    const KEY_HOME_KICKOFFS = 'HomeKickoffs';
    const KEY_HOME_KICKOFFS_IN_END_ZONE = 'HomeKickoffsInEndZone';
    const KEY_HOME_OFFENSIVE_PLAYS = 'HomeOffensivePlays';
    const KEY_HOME_OFFENSIVE_YARDS = 'HomeOffensiveYards';
    const KEY_HOME_OFFENSIVE_YARDS_PER_PLAY = 'HomeOffensiveYardsPerPlay';
    const KEY_HOME_PASSER_RATING = 'HomePasserRating';
    const KEY_HOME_PASSES_DEFENDED = 'HomePassesDefended';
    const KEY_HOME_PASSING_ATTEMPTS = 'HomePassingAttempts';
    const KEY_HOME_PASSING_COMPLETIONS = 'HomePassingCompletions';
    const KEY_HOME_PASSING_INTERCEPTIONS = 'HomePassingInterceptions';
    const KEY_HOME_PASSING_TOUCHDOWNS = 'HomePassingTouchdowns';
    const KEY_HOME_PASSING_YARDS = 'HomePassingYards';
    const KEY_HOME_PASSING_YARDS_PER_ATTEMPT = 'HomePassingYardsPerAttempt';
    const KEY_HOME_PASSING_YARDS_PER_COMPLETION = 'HomePassingYardsPerCompletion';
    const KEY_HOME_PENALTIES = 'HomePenalties';
    const KEY_HOME_PENALTY_YARDS = 'HomePenaltyYards';
    const KEY_HOME_PUNT_AVERAGE = 'HomePuntAverage';
    const KEY_HOME_PUNT_NET_AVERAGE = 'HomePuntNetAverage';
    const KEY_HOME_PUNT_NET_YARDS = 'HomePuntNetYards';
    const KEY_HOME_PUNT_RETURN_LONG = 'HomePuntReturnLong';
    const KEY_HOME_PUNT_RETURN_TOUCHDOWNS = 'HomePuntReturnTouchdowns';
    const KEY_HOME_PUNT_RETURN_YARDS = 'HomePuntReturnYards';
    const KEY_HOME_PUNT_RETURNS = 'HomePuntReturns';
    const KEY_HOME_PUNT_YARDS = 'HomePuntYards';
    const KEY_HOME_PUNTS = 'HomePunts';
    const KEY_HOME_PUNTS_HAD_BLOCKED = 'HomePuntsHadBlocked';
    const KEY_HOME_QUARTERBACK_HITS = 'HomeQuarterbackHits';
    const KEY_HOME_RED_ZONE_ATTEMPTS = 'HomeRedZoneAttempts';
    const KEY_HOME_RED_ZONE_CONVERSIONS = 'HomeRedZoneConversions';
    const KEY_HOME_RETURN_YARDS = 'HomeReturnYards';
    const KEY_HOME_RUSHING_ATTEMPTS = 'HomeRushingAttempts';
    const KEY_HOME_RUSHING_TOUCHDOWNS = 'HomeRushingTouchdowns';
    const KEY_HOME_RUSHING_YARDS = 'HomeRushingYards';
    const KEY_HOME_RUSHING_YARDS_PER_ATTEMPT = 'HomeRushingYardsPerAttempt';
    const KEY_HOME_SACK_YARDS = 'HomeSackYards';
    const KEY_HOME_SACKS = 'HomeSacks';
    const KEY_HOME_SAFETIES = 'HomeSafeties';
    const KEY_HOME_SCORE = 'HomeScore';
    const KEY_HOME_SCORE_OVERTIME = 'HomeScoreOvertime';
    const KEY_HOME_SCORE_QUARTER_FIRST = 'HomeScoreQuarter1';
    const KEY_HOME_SCORE_QUARTER_SECOND = 'HomeScoreQuarter2';
    const KEY_HOME_SCORE_QUARTER_THIRD = 'HomeScoreQuarter3';
    const KEY_HOME_SCORE_QUARTER_FOURTH = 'HomeScoreQuarter4';
    const KEY_HOME_SOLO_TACKLES = 'HomeSoloTackles';
    const KEY_HOME_TACKLES_FOR_LOSS = 'HomeTacklesForLoss';
    const KEY_HOME_TAKEAWAYS = 'HomeTakeaways';
    const KEY_HOME_TEAM = 'HomeTeam';
    const KEY_HOME_THIRD_DOWN_ATTEMPTS = 'HomeThirdDownAttempts';
    const KEY_HOME_THIRD_DOWN_CONVERSIONS = 'HomeThirdDownConversions';
    const KEY_HOME_THIRD_DOWN_PERCENTAGE = 'HomeThirdDownPercentage';
    const KEY_HOME_TIME_OF_POSSESSION = 'HomeTimeOfPossession';
    const KEY_HOME_TIMES_SACKED = 'HomeTimesSacked';
    const KEY_HOME_TIMES_SACKED_YARDS = 'HomeTimesSackedYards';
    const KEY_HOME_TOUCHDOWNS = 'HomeTouchdowns';
    const KEY_HOME_TURNOVER_DIFFERENTIAL = 'HomeTurnoverDifferential';

    const KEY_HUMIDITY = 'Humidity';
    const KEY_IS_GAME_OVER = 'IsGameOver';
    const KEY_OVER_UNDER = 'OverUnder';
    const KEY_PLAYING_SURFACE = 'PlayingSurface';
    const KEY_POINT_SPREAD = 'PointSpread';
    const KEY_SEASON = 'Season';
    const KEY_SEASON_TYPE = 'SeasonType';
    const KEY_STADIUM = 'Stadium';
    const KEY_STADIUM_DETAILS = 'StadiumDetails';
    const KEY_STADIUM_ID = 'StadiumID';
    const KEY_TEMPERATURE = 'Temperature';
    const KEY_TOTAL_SCORE = 'TotalScore';
    const KEY_WEEK = 'Week';
    const KEY_WIND_SPEED = 'WindSpeed';
}