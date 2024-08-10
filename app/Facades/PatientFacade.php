<?php
namespace App\Facades;

use App\Services\PatientService;

class PatientFacade
{
    protected static $patientService;

    public static function getFacadeRoot()
    {
        if (!self::$patientService) {
            self::$patientService = new patientService();
        }

        return self::$patientService;
    }

    public static function __callStatic($method, $args)
    {
        $instance = self::getFacadeRoot();

        return $instance->$method(...$args);
    }
}
