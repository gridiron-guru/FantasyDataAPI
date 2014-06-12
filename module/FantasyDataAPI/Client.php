<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */
namespace FantasyDataAPI;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use InvalidArgumentException;
use FantasyDataAPI\Enum;
use GuzzleHttp\Command;

/**
 * Web service client for FantasyDataAPI
 *
 * @method Command\Model AreAnyGamesInProgress() AreAnyGamesInProgress( array $pOptions )
 * @method Command\Model Teams() Teams( array $pOptions )
 * @method Command\Model Schedules() Schedules( array $pOptions )
 * @method Command\Model Byes() Byes( array $pOptions )
 * @method Command\Model Scores() Scores( array $pOptions )
 * @method Command\Model ScoresByWeek() ScoresByWeek( array $pOptions )
 * @method Command\Model TeamGameStats() TeamGameStats( array $pOptions )
 * @method Command\Model TeamSeasonStats() TeamSeasonStats( array $pOptions )
 * @method Command\Model Players() Players( array $pOptions )
 * @method Command\Model Player() Player( array $pOptions )
 * @method Command\Model FreeAgents() FreeAgents( array $pOptions )
 * @method Command\Model PlayerGameStatsByTeam() PlayerGameStatsByTeam( array $pOptions )
 * @method Command\Model PlayerSeasonStatsByTeam() PlayerSeasonStatsByTeam( array $pOptions )
 * @method Command\Model PlayerGameStatsByPlayerID() PlayerGameStatsByPlayerID( array $pOptions )
 * @method Command\Model PlayerSeasonStatsByPlayerID() PlayerSeasonStatsByPlayerID( array $pOptions )
 * @method Command\Model SeasonLeagueLeaders() SeasonLeagueLeaders( array $pOptions )
 * @method Command\Model GameLeagueLeaders() GameLeagueLeaders( array $pOptions )
 * @method Command\Model FantasyDefenseByGame() FantasyDefenseByGame( array $pOptions )
 * @method Command\Model FantasyDefenseBySeason() FantasyDefenseBySeason( array $pOptions )
 *
 * @method Command\Model Standings() Standings( array $pOptions )
 * @method Command\Model Timeframes() Timeframes( array $pOptions )
 */
class Client extends GuzzleClient
{
    /**
     * @param string $pApiKey
     * @param \GuzzleHttp\Command\Guzzle\Description|string $pSubscription
     *
     * @throws InvalidArgumentException
     */
    public function __construct($pApiKey, $pSubscription = Enum\Subscription::KEY_DEVELOPER)
    {
        if ( empty( $pApiKey ) )
        {
            throw new InvalidArgumentException("API key must not be empty.");
        }

        if (false === Enum\Subscription::IsValid($pSubscription))
        {
            throw new InvalidArgumentException("Subscription provided '$pSubscription' is invalid.");
        }

        $service_config = require 'Resources/fantasy_data_api.php';
        $description = new Description($service_config);

        $client = $this->CreateHttpClient();

        parent::__construct($client, $description);

        $this->setConfig('defaults/Subscription', $pSubscription);
        $this->setConfig('defaults/key', $pApiKey);
    }

    /**
     * @param array $pOptions
     *
     * @return HttpClient
     */
    protected function CreateHttpClient($pOptions=[])
    {
        return new HttpClient($pOptions);
    }
}