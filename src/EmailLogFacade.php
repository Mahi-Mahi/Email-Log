<?php

namespace MahiMahi\EmailLog;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MahiMahi\EmailLog\Skeleton\SkeletonClass
 */
class EmailLogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'email-log';
    }
}
