<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */
namespace FantasyDataAPI\Test\Mock;

use FantasyDataAPI\Test\DebugClient;
use GuzzleHttp\Adapter\MockAdapter;
use GuzzleHttp\Adapter\TransactionInterface;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream;

/**
 * @package FantasyDataAPI\Mock
 *
 * The MockTimeframesClient attaches a mock adapter to the client so that when
 * a call is made to retrieve Timeframes.php it will respond from the Mock instead
 * of the live service.
 */
abstract class Client extends DebugClient
{
    const KEY_HEADER_PATH = 'header_path';
    const KEY_BODY_PATH = 'body_path';

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
            // You have access to the request
            $request = $trans->getRequest();

            $path = $this->GetFilePaths($request);

            $headers = include($path[static::KEY_HEADER_PATH]);
            $response_code = explode(' ', $headers[0])[1];;

            $mocked_response = file_get_contents($path[static::KEY_BODY_PATH]);
            $stream = Stream\Stream::factory($mocked_response);

            return new Response($response_code, $headers, $stream);
        });

        return parent::CreateHttpClient(['adapter' => $mockAdapter]);
    }

    /**
     * This method is responsible for parsing out Resource specific details
     * from the GuzzleHttp\Command\Request object so that we can determine
     * which Mock files to load up inside the MockAdapter's anon function
     *
     * This method is called from the MockClient CreateHttpClient method
     *
     * @param RequestInterface $pRequest
     *
     * @return array
     */
    abstract protected function GetFilePaths( RequestInterface $pRequest );
} 