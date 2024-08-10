<?php

namespace App\Controllers\Partner;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PartnerController extends BaseController
{
    public function index()
    {
        return view("dashboard");
    }
    public function dashboard(){
        $this->setPageTitle('Partner Dashbord');
        $sessionData = session()->get();
        //echo '<pre>';print_r($sessionData);
        return view('partner/dashboard', [
            'pageTitle' => $this->getPageTitle(),
            'session_data' => $sessionData
        ]);
    }
}
