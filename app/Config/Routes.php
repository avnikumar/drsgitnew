<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Front\Home::index');
$routes->get('/services', 'Front\Home::services');

//Test for chat app
//$routes->get('chat', 'Chat\ChatController::index');

//...

$routes->match(['GET', 'POST'], 'register-patient', 'Auth\RegisterController::registerPatient', ["filter" => "noauth"]);
$routes->match(['GET', 'POST'], 'register-doctor', 'Auth\RegisterController::registerDoctor', ["filter" => "noauth"]);
$routes->match(['GET', 'POST'], 'register-partner', 'Auth\RegisterController::registerPartner', ["filter" => "noauth"]);

$routes->match(['GET', 'POST'], 'login-patient', 'Auth\LoginController::loginPatient', ["filter" => "noauth"]);
$routes->match(['GET', 'POST'], 'verify-otp-patient', 'Auth\LoginController::verifyOtpPatient');
$routes->match(['GET', 'POST'], 'login-doctor', 'Auth\LoginController::loginDoctor', ["filter" => "noauth"]);
$routes->match(['GET', 'POST'], 'verify-otp-doctor', 'Auth\LoginController::verifyOtpDoctor', ["filter" => "noauth"]);
$routes->match(['GET', 'POST'], 'login-partner', 'Auth\LoginController::loginPartner', ["filter" => "noauth"]);
$routes->match(['GET', 'POST'], 'verify-otp-partner', 'Auth\LoginController::verifyOtpPartner', ["filter" => "noauth"]);

//Common Routes
//Html Output option values
$routes->match(['POST'],"get_cities_option_list_by_state_id", "Common\CommonController::getCitiesOptionListByStateId");
$routes->match(['POST'],"get_languag_list", "Common\CommonController::getLanguageList");
$routes->match(['POST'],"upload_document", "Common\CommonController::uploadDocument");

$routes->match(['GET'],'imageCrop', 'ImageController::imageCrop');
$routes->match(['POST'],'image/upload', 'ImageController::upload');
// Patient routes
$routes->group("patient", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Patient\PatientController::index");
    $routes->get("dashboard", "Patient\PatientController::dashboard");
    $routes->get("my_bookings", "Patient\PatientController::myBookings");
    $routes->get("my_doctors", "Patient\PatientController::myDoctors");
    $routes->get("my_settings", "Patient\PatientController::mySettings");
    $routes->post("my_settings", "Patient\PatientController::mySettings");
    
});

// Doctor routes
$routes->group("doctor", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Doctor\DoctorController::index");
    $routes->get("dashboard", "Doctor\DoctorController::dashboard");
    $routes->get("my_bookings", "Doctor\DoctorController::myBookings");
    $routes->get("my_patients", "Doctor\DoctorController::myPatients");
    $routes->get("my_settings", "Doctor\DoctorController::mySettings");
    $routes->post("my_settings", "Doctor\DoctorController::mySettings");
    
    $routes->post("add_language", "Doctor\DoctorController::addLanguage");
    $routes->post("remove_language", "Doctor\DoctorController::removeLanguage");

    $routes->post("add_specialization", "Doctor\DoctorController::addSpecialization");
    $routes->post("remove_specialization", "Doctor\DoctorController::removeSpecialization");
    
    $routes->post("add_qualification", "Doctor\DoctorController::addQualification");
    $routes->post("remove_qualification", "Doctor\DoctorController::removeQualification");
    $routes->post("update_online_service_rate", "Doctor\DoctorController::updateOnlineCallServiceRate");
    $routes->post("update_house_call_service_rate", "Doctor\DoctorController::updateHouseCallServiceRate");
    $routes->post("update_clinic_visit_service_rate", "Doctor\DoctorController::updateClinicVisitServiceRate");

    $routes->post("update_password", "Doctor\DoctorController::updatePassword");
    $routes->post("add_bank_details", "Doctor\DoctorController::addBankDetails");
    $routes->post("add_location", "Doctor\DoctorController::addLocation");
    $routes->get("update_location_form", "Doctor\DoctorController::updateLocationForm");
});

// Partners routes
$routes->group("partner", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Partner\PartnerController::index");
    $routes->get("dashboard", "Partner\PartnerController::dashboard");
});

// Admin routes
$routes->group("superAdmin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "SuperAdmin\SuperAdminController::index");
    $routes->get("dashboard", "SuperAdmin\SuperAdminController::dashboard");
});

// Admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "Admin\AdminController::index");
    $routes->get("dashboard", "Admin\AdminController::dashboard");
});

$routes->match(['GET'], 'logout', 'Auth\LoginController::logout', ["filter" => "auth"]);

