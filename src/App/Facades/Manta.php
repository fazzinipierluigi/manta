<?php

namespace fazzinipierluigi\Manta\App\Facades;

use Illuminate\Support\Facades\Facade;

class Manta extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'manta';
    }
}
