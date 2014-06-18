<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */
namespace FantasyDataAPI\Test;

use GuzzleHttp\Adapter\MockAdapter;
use GuzzleHttp\Adapter\TransactionInterface;

/**
 * @package FantasyDataAPI\Mock
 *
 * The MockTimeframesClient attaches a mock adapter to the client so that when
 * a call is made to retrieve Timeframes.php it will respond from the Mock instead
 * of the live service.
 */
class MockClient extends DebugClient
{

    /**
     * @param array $pOptions
     *
     * @return \GuzzleHttp\Client
     */
    protected function CreateHttpClient($pOptions=array())
    {
        /**
         * My gut says there must be a much better way of doing this, if you run across a
         * better way, please issue a pull request or drop me a message. @oakensoul
         */
        $mockAdapter = new MockAdapter(function (TransactionInterface $trans) {
            return ResponseFactory::GetResponse( $trans );
        });

        return parent::CreateHttpClient(['adapter' => $mockAdapter]);
    }
}