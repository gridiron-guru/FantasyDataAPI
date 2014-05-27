<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */
namespace FantasyDataAPI;

use GuzzleHttp\Subscriber\History;

/**
 * Class SubscriberHistoryClient
 * @package FantasyDataAPI\Mock
 *
 * This Client is meant to set up the Subscriber History listener. This
 * can then be used to retrieve the service response which is useful for
 * building Mocks. This client should not be used in production.
 */
class SubscriberHistoryClient extends Client
{
    /**
     * @var History $mHistory
     */
    public $mHistory;

    /**
     * @param array $pOptions
     *
     * @return \GuzzleHttp\Client
     */
    protected function CreateHttpClient($pOptions=[])
    {
        $client = parent::CreateHttpClient($pOptions);

        $this->mHistory = new History();
        $client->getEmitter()->attach($this->mHistory);

        return $client;
    }
} 