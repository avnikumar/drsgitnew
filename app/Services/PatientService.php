<?php
namespace App\Services;
use App\Models\PatientModel;
use App\Models\PatientAddressModel;
class PatientService
{
    protected $patientModel;
    protected $patientAddressModel;

    public function __construct()
    {
        $this->patientModel = new PatientModel();
        $this->patientAddressModel = new PatientAddressModel();
    }
    public function getPatientDetailsByUserId($userId)
    {
        return $this->patientModel->getDetailsByUserId($userId);
    }
    public function getPatientDetailsByUserEmail($userEmail)
    {
        return $this->patientModel->getDetailsByUserEmail($userEmail);
    }
    public function getPatientAddressByUserId($userId)
    {
        return $this->patientAddressModel->getAddressByUserId($userId);
    }
}
