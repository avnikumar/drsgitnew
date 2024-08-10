<?php
namespace App\Facades;

use App\Services\DoctorService;

class DoctorFacade
{
    protected static $doctorService;

    public static function getFacadeRoot()
    {
        if (!self::$doctorService) {
            self::$doctorService = new doctorService();
        }

        return self::$doctorService;
    }

    public static function __callStatic($method, $args)
    {
        $instance = self::getFacadeRoot();

        return $instance->$method(...$args);
    }
}
