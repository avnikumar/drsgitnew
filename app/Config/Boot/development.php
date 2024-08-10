<?php

/*
 |--------------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------------
 | In development, we want to show as many errors as possible to help
 | make sure they don't make it to production. And save us hours of
 | painful debugging.
 |
 | If you set 'display_errors' to '1', CI4's detailed error report will show.
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
/*
 |--------------------------------------------------------------------------
 | DEBUG BACKTRACES
 |--------------------------------------------------------------------------
 | If true, this constant will tell the error screens to display debug
 | backtraces along with the other error information. If you would
 | prefer to not see this, set this value to false.
 */
defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

/*
 |--------------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------------
 | Debug mode is an experimental flag that can allow changes throughout
 | the system. This will control whether Kint is loaded, and a few other
 | items. It can always be used within your own application too.
 */
defined('CI_DEBUG') || define('CI_DEBUG', true);

//Self Defined Constant
require_once APPPATH . 'Config/Constants.php';

//Common
define('INNER_IMAGES_PATH', '../public/inner/images/');

//For Patient Profile
define('PATIENT_PROFILE_PIC_PATH', '/uploads/patient/profile_pic/');
define('PATIENT_ID_PROOF_FILE_PATH', '/uploads/patient/document/');

//For Doctor Profile
define('DOCTOR_PROFILE_PIC_PATH', '/uploads/doctor/profile_pic/');
define('DOCTOR_ID_PROOF_FILE_PATH', '/uploads/doctor/document/');
