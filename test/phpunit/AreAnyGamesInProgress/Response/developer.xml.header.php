<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

$headers = [];
$headers[] = 'HTTP/1.1 200 OK';
$headers[] = 'Cache-Control: must-revalidate, max-age=0, private';
$headers[] = 'Content-Length: 84';
$headers[] = 'Content-Type: application/xml; charset=utf-8';
$headers[] = 'Expires: Sun, 01 Jun 2014 18:10:24 GMT';
$headers[] = 'Last-Modified: Sun, 01 Jun 2014 18:02:47 GMT';
$headers[] = 'Vary: Accept,Accept-Charset';
$headers[] = 'X-Powered-By: ASP.NET';
$headers[] = 'X-Mashape-Billing: Call Limit=1';
$headers[] = 'Date: Sun, 01 Jun 2014 18:10:24 GMT';

return $headers;
