<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Enum\Teams;


class Property
{
    const KEY_CITY = 'City';
    const KEY_CONFERENCE = 'Conference';
    const KEY_DIVISION = 'Division';
    const KEY_FULL_NAME = 'FullName';
    const KEY_KEY = 'Key';
    const KEY_NAME = 'Name';
    const KEY_STADIUM_DETAILS = 'StadiumDetails';
    const KEY_STADIUM_ID = 'StadiumID';

    /** 06/07/2014 Update */
    const KEY_AVERAGE_DRAFT_POSITION = 'AverageDraftPosition';
    const KEY_AVERAGE_DRAFT_POSITION_PPR = 'AverageDraftPositionPPR';
    const KEY_BYE_WEEK = 'ByeWeek';
    const KEY_DEFENSIVE_COORDINATOR = 'DefensiveCoordinator';
    const KEY_DEFENSIVE_SCHEME = 'DefensiveScheme';
    const KEY_HEAD_COACH = 'HeadCoach';
    const KEY_OFFENSIVE_COORDINATOR = 'OffensiveCoordinator';
    const KEY_OFFENSIVE_SCHEME = 'OffensiveScheme';
    const KEY_SPECIAL_TEAMS_COACH = 'SpecialTeamsCoach';

    /** no idea what this is for, I have an email into Scott about this */
    const KEY_PLAYER_ID = 'PlayerID';
    const KEY_TEAM_ID = 'TeamID';

    /** added in v2 */
    const KEY_UPCOMING_SALARY = 'UpcomingSalary';
    const KEY_UPCOMING_OPPONENT_RANK = 'UpcomingOpponentRank';
    const KEY_UPCOMING_OPPONENT_POSITION_RANK = 'UpcomingOpponentPositionRank';
}