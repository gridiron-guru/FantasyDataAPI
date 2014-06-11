<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */
date_default_timezone_set('UTC');

define( 'ERROR_API_KEY_NOT_CONFIGURED', 1 );

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir( dirname(dirname(__DIR__)) );

// Setup autoloading
require 'init_autoloader.php';

$config_file = 'test/phpunit/config.php';

if ( file_exists( $config_file ) )
{
    require $config_file;
}

if (false == array_key_exists('FANTASY_DATA_API_KEY', $_SERVER ) || empty( $_SERVER['FANTASY_DATA_API_KEY']))
{
    echo "Error: API Key not configured.\n";
    return ERROR_API_KEY_NOT_CONFIGURED;
}

return 0;