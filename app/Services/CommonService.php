<?php
namespace App\Services;
use App\Models\LocationModel;
class CommonService
{
    protected $locationModel;

    public function __construct()
    {
        $this->locationModel = new LocationModel();
    }
    public function getCityStateId($userId)
    {
        return $this->locationModel->getDetailsByUserId($userId);
    }
    
}
