<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Mock;

use GuzzleHttp\Adapter\TransactionInterface;
use FantasyDataAPI\Test;

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
                $response = new Test\AreAnyGamesInProgress\Response\Mock( $request );
                break;

            case 'Byes':
                $response = new Test\Byes\Response\Mock( $request );
                break;

            case 'FantasyDefenseByGame':
                $response = new Test\FantasyDefenseByGame\Response\Mock( $request );
                break;

            case 'FantasyDefenseBySeason':
                $response = new Test\FantasyDefenseBySeason\Response\Mock( $request );
                break;

            case 'FreeAgents':
                $response = new Test\FreeAgents\Response\Mock( $request );
                break;

            case 'GameLeagueLeaders':
                $response = new Test\GameLeagueLeaders\Response\Mock( $request );
                break;

            case 'Injuries':
                $response = new Test\Injuries\Response\Mock( $request );
                break;

            case 'News':
                $response = new Test\News\Response\Mock( $request );
                break;

            case 'Player':
                $response = new Test\Player\Response\Mock( $request );
                break;

            case 'PlayerGameStatsByPlayerID':
                $response = new Test\PlayerGameStatsByPlayerID\Response\Mock( $request );
                break;

            case 'PlayerGameStatsByTeam':
                $response = new Test\PlayerGameStatsByTeam\Response\Mock( $request );
                break;

            case 'Players':
                $response = new Test\Players\Response\Mock( $request );
                break;

            case 'PlayerSeasonStatsByPlayerID':
                $response = new Test\PlayerSeasonStatsByPlayerID\Response\Mock( $request );
                break;

            case 'PlayerSeasonStatsByTeam':
                $response = new PlayerSeasonStatsByTeam\MockResponse( $request );
                break;

            case 'Schedules':
                $response = new Schedules\MockResponse( $request );
                break;

            case 'Scores':
                $response = new Scores\MockResponse( $request );
                break;

            case 'ScoresByWeek':
                $response = new ScoresByWeek\MockResponse( $request );
                break;

            case 'SeasonLeagueLeaders':
                $response = new SeasonLeagueLeaders\MockResponse( $request );
                break;

            case 'Standings':
                $response = new Standings\MockResponse( $request );
                break;

            case 'TeamGameStats':
                $response = new TeamGameStats\MockResponse( $request );
                break;

            case 'Teams':
                $response = new Teams\MockResponse( $request );
                break;

            case 'TeamSeasonStats':
                $response = new TeamSeasonStats\MockResponse( $request );
                break;

            case 'Timeframes':
                $response = new Timeframes\MockResponse( $request );
                break;

            default:
                throw new \Exception( "Unrecognized resource requested, $resource" );
                break;
        }

        return $response;
    }
} 