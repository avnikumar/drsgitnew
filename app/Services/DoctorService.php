<?php
namespace App\Services;
use App\Models\DoctorModel;
use App\Models\DoctorAddressModel;
class DoctorService
{
    protected $doctorModel;
    protected $doctorAddressModel;

    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
        $this->doctorAddressModel = new DoctorAddressModel();
    }
    public function getDoctorDetailsByUserId($userId)
    {
        return $this->doctorModel->getDetailsByUserId($userId);
    }
    public function getDoctorDetailsByUserEmail($userEmail)
    {
        return $this->doctorModel->getDetailsByUserEmail($userEmail);
    }
    public function getDoctorAddressByUserId($userId)
    {
        return $this->doctorAddressModel->getAddressByUserId($userId);
    }
    public function updatePassword($userId, $oldPassword, $newPassword)
    {
        return $this->doctorModel->updatePassword($userId, $oldPassword, $newPassword);
    }
}
