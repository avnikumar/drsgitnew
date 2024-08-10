<?php
namespace App\Facades;

use App\Services\CommonService;

class CommonFacade
{
    protected static $commonService;

    public static function getFacadeRoot()
    {
        if (!self::$commonService) {
            self::$commonService = new commonService();
        }

        return self::$commonService;
    }

    public static function __callStatic($method, $args)
    {
        $instance = self::getFacadeRoot();

        return $instance->$method(...$args);
    }
}
