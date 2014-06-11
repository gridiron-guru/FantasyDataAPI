<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Enum\Timeframes;


class Type
{
    const KEY_CURRENT = 'current';
    const KEY_UPCOMING = 'upcoming';
    const KEY_COMPLETED = 'completed';
    const KEY_RECENT = 'recent';
    const KEY_ALL = 'all';

    public static function IsValid($pType)
    {
        $valid = [];
        $valid[] = static::KEY_CURRENT;
        $valid[] = static::KEY_UPCOMING;
        $valid[] = static::KEY_COMPLETED;
        $valid[] = static::KEY_RECENT;
        $valid[] = static::KEY_ALL;

        $is_valid = in_array($pType, $valid) ? true : false;

        return $is_valid;
    }
}