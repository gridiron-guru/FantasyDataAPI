<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */
namespace FantasyDataAPI\Test\Mock\Timeframes;

use FantasyDataAPI\Test\Mock;
use GuzzleHttp\Message\RequestInterface;

/**
 * Class MockTimeframesClient
 * @package FantasyDataAPI\Mock
 *
 * The MockTimeframesClient attaches a mock adapter to the client so that when
 * a call is made to retrieve Timeframes.php it will respond from the Mock instead
 * of the live service.
 */
class MockClient extends Mock\Client
{
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
    protected function GetFilePaths( RequestInterface $pRequest )
    {
        /** url parsing "formula" for Timeframes */
        list(, $subscription, $format, , $type) = explode( '/', $pRequest->getPath() );

        $file_partial = __DIR__ . '/Response/' . implode('.', [$subscription, $format, $type]);

        $result = [];
        $result[static::KEY_HEADER_PATH] = $file_partial . '.header.php';
        $result[static::KEY_BODY_PATH] = $file_partial . '.body.' . $format;

        return $result;
    }
}