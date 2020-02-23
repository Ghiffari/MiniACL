<?php

namespace Ghiffariaq\MiniACL\Facades;

use Illuminate\Support\Facades\Facade;

class MiniACL extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'miniacl';
    }
}