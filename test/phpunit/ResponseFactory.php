<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test;

use GuzzleHttp\Adapter\TransactionInterface;

class ResponseFactory
{
    public static function GetResponse( TransactionInterface $trans )
    {
        /**
         * Get the GuzzleHttp\Message\Request so that we can pick
         * out the information we need to generate a MockResponse
         */
        $request = $trans->getRequest();

        /**
         * Normally, I wouldn't condone this sort of weird URL munging
         * but the FantasyData service always formats its urls as
         * /<subscription>/<format>/<Resource>/ so I know I can always
         * ignore the first three elements (2 params) of the getPath
         * call for this service.
         *
         * Getting the resource here allows me to use that as a path
         * element for creating a "MockResponse" object on the fly
         */
        list(, , , $resource) = explode( '/', $request->getPath() );

        switch ( $resource )
        {
            case 'AreAnyGamesInProgress':
                $response = new AreAnyGamesInProgress\Response\Mock( $request );
                break;

            case 'Byes':
                $response = new Byes\Response\Mock( $request );
                break;

            case 'FantasyDefenseByGame':
                $response = new FantasyDefenseByGame\Response\Mock( $request );
                break;

            case 'FantasyDefenseBySeason':
                $response = new FantasyDefenseBySeason\Response\Mock( $request );
                break;

            case 'FreeAgents':
                $response = new FreeAgents\Response\Mock( $request );
                break;

            case 'GameLeagueLeaders':
                $response = new GameLeagueLeaders\Response\Mock( $request );
                break;

            case 'Injuries':
                $response = new Injuries\Response\Mock( $request );
                break;

            case 'News':
                $response = new News\Response\Mock( $request );
                break;

            case 'NewsByPlayerID':
                $response = new NewsByPlayerID\Response\Mock( $request );
                break;

            case 'Player':
                $response = new Player\Response\Mock( $request );
                break;

            case 'PlayerGameStatsByPlayerID':
                $response = new PlayerGameStatsByPlayerID\Response\Mock( $request );
                break;

            case 'PlayerGameStatsByTeam':
                $response = new PlayerGameStatsByTeam\Response\Mock( $request );
                break;

            case 'Players':
                $response = new Players\Response\Mock( $request );
                break;

            case 'PlayerSeasonStatsByPlayerID':
                $response = new PlayerSeasonStatsByPlayerID\Response\Mock( $request );
                break;

            case 'PlayerSeasonStatsByTeam':
                $response = new PlayerSeasonStatsByTeam\Response\Mock( $request );
                break;

            case 'Schedules':
                $response = new Schedules\Response\Mock( $request );
                break;

            case 'Scores':
                $response = new Scores\Response\Mock( $request );
                break;

            case 'ScoresByWeek':
                $response = new ScoresByWeek\Response\Mock( $request );
                break;

            case 'SeasonLeagueLeaders':
                $response = new SeasonLeagueLeaders\Response\Mock( $request );
                break;

            case 'Standings':
                $response = new Standings\Response\Mock( $request );
                break;

            case 'TeamGameStats':
                $response = new TeamGameStats\Response\Mock( $request );
                break;

            case 'Teams':
                $response = new Teams\Response\Mock( $request );
                break;

            case 'TeamSeasonStats':
                $response = new TeamSeasonStats\Response\Mock( $request );
                break;

            case 'Timeframes':
                $response = new Timeframes\Response\Mock( $request );
                break;

            default:
                throw new \Exception( "Unrecognized resource requested, $resource" );
                break;
        }

        return $response;
    }
} 