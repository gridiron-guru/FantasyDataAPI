<?php
/**
 * @link      https://github.com/gridiron-guru/FantasyDataAPI for the canonical source repository
 * @copyright Copyright (c) 2014 Robert Gunnar Johnson Jr.
 * @license   http://opensource.org/licenses/Apache-2.0
 * @package   FantasyDataAPI
 */

namespace FantasyDataAPI\Enum;


class Subscription
{
    const KEY_FREE_TRIAL = 'trial';
    const KEY_DEVELOPER = 'developer';
    const KEY_STANDARD = 'standard';
    const KEY_PREMIUM = 'premium';
    const KEY_ENTERPRISE = 'enterprise';

    public static function IsValid($pSubscription)
    {
        $valid = [];
        $valid[] = static::KEY_FREE_TRIAL;
        $valid[] = static::KEY_DEVELOPER;
        $valid[] = static::KEY_STANDARD;
        $valid[] = static::KEY_PREMIUM;
        $valid[] = static::KEY_ENTERPRISE;

        $is_valid = in_array($pSubscription, $valid) ? true : false;

        return $is_valid;
    }
}