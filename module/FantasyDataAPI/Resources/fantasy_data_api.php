<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */

$resources = [];
$resources['baseUrl'] = 'http://api.nfldata.apiphany.com/{Subscription}/{Format}/';

/**
 * Action: Check If Games In Progress
 * Resource: AreAnyGamesInProgress
 *
 * http://api.nfldata.apiphany.com/{subscription}/{format}/AreAnyGamesInProgress?key=<Your_developer_key>
 */
$resources['operations']['AreAnyGamesInProgress'] = [
    'httpMethod' => 'GET',
    'uri' => 'AreAnyGamesInProgress',
    'responseModel' => 'XML_Resource',
    'parameters' => [
        'Subscription' => [ 'type' => 'string', 'location' => 'uri' ],
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'xml' ],
        'key' => [ 'type' => 'string', 'location' => 'query' ]
    ]
];


/**
 * Action:
 * Resource:
 *
 * http://api.nfldata.apiphany.com/{subscription}/{format}/ ???? ?key=<Your_developer_key>
 */

//Get Last Completed Season
//Get Current Season
//Get Upcoming Season
//Get Last Completed Week
//Get Current Week
//Get Upcoming Week
//Get Teams for Season
//Get Schedules for Season
//Get Bye Week for Season
//Get Game Scores for Season
//Get Scores for Season and Week
//Get Team Stats per Game for Season for Week

/**
 * Action: Team Stats for Season
 * Resource: TeamSeasonStats
 *
 * http://api.nfldata.apiphany.com/{subscription}/{format}/TeamSeasonStats/{Season}?key=<Your_developer_key>
 */
$resources['operations']['TeamSeasonStats'] = [
    'httpMethod' => 'GET',
    'uri' => 'TeamSeasonStats/{Season}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Subscription' => [ 'type' => 'string', 'location' => 'uri' ],
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'key' => [ 'type' => 'string', 'location' => 'query' ],
        'Season' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

//Get Team Standings for Season
//Get Team Roster and Depth Charts
//Get Player Stats and News
//Get Free Agents
//Get Players Game Stats by Team for Season for Week
//Get Players Season Stats by Team
//Get Player Game Stats for Season for Week
//Get Player Season Stats
//Get Season League Leaders
//Get Game League Leaders
//Get Fantasy Defense By Game
//Get Fantasy Defense for Season
//Get Injuries for Season for Week
//Get Injuries for Season for Week for Team
//Get News</a>
//Get News For Player</a>
//Get News For Team
//Get Box Score
//Get Live Box Scores
//Get Players Game Stats for Season for Week
//Get Game Stats for Season
//Get Game Stats for Season for Week

/**
 * Action: Get Timeframes
 * Resource: Timeframes
 *
 * http://api.nfldata.apiphany.com/{subscription}/{format}/Timeframes.php/{Type}?key=<Your_developer_key>
 */
$resources['operations']['Timeframes'] = [
    'httpMethod' => 'GET',
    'uri' => 'Timeframes/{Type}',
    'responseModel' => 'JSON_Resource',
    'parameters' => [
        'Subscription' => [ 'type' => 'string', 'location' => 'uri' ],
        'Format' => [ 'type' => 'string', 'location' => 'uri', 'default' => 'json' ],
        'key' => [ 'type' => 'string', 'location' => 'query' ],
        'Type' => [
            'required' => true,
            'type' => 'string',
            'location' => 'uri'
        ]
    ]
];

//Get Final Box Scores
//Get Active Box Scores
//Get Box Scores for Season for Week
//Get Stadiums
//Get Error Sample
//Match Player
//Get Projected Players Game Stats by Season, Week and Team


/**
 * These models are used by Guzzle to determine how to return the result
 * from any given call.
 *
 * The additionalProperties['location'] tells the guzzle response model
 * where to look for the response data and how to parse it.
 */
$resources['models'] = [
    'JSON_Resource' => [
        'type' => 'object',
        'additionalProperties' => [
            'location' => 'json'
        ]
    ],
    'XML_Resource' => [
        'type' => 'object',
        'additionalProperties' => [
            'location' => 'xml'
        ]
    ]
];

return $resources;