<?php 

namespace Hisway\VipClient\Facades;

use Illuminate\Support\Facades\Facade;

class VipClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vipclient';
    }
}