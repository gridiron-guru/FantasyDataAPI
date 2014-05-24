<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Enum;


class Format
{
    const KEY_JSON = 'json';
    const KEY_XML = 'xml';

    public static function IsValid($pFormat)
    {
        $valid = [];
        $valid[] = static::KEY_JSON;
        $valid[] = static::KEY_XML;

        $is_valid = in_array($pFormat, $valid) ? true : false;

        return $is_valid;
    }
}