<?php
namespace App\Controllers\Front;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index(): string
    {
        return view('front/home');
    }
    public function services(): string
    {
        return view('front/services');
    }
}
