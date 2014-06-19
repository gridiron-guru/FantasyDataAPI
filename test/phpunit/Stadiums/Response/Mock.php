<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Test\Stadiums\Response;

use GuzzleHttp\Message\Response;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream;

class Mock extends Response
{

    public function __construct (RequestInterface $pRequest)
    {
        /** url parsing "formula" for resource */
        list(, $subscription, $format) = explode( '/', $pRequest->getPath() );

        $file_partial = __DIR__ . '/' . implode('.', [$subscription, $format]);

        $headers = include($file_partial . '.header.php');
        $response_code = explode(' ', $headers[0])[1];

        $mocked_response = file_get_contents($file_partial . '.body.' . $format);
        $stream = Stream\Stream::factory($mocked_response);

        parent::__construct($response_code, $headers, $stream);
    }
} 