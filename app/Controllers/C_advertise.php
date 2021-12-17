<?php

namespace App\Controllers;

class C_advertise extends BaseController
{
    public function index()
    {
        $this->start();
        if(!isset($_SESSION['connect'])){
            echo view('c_sign_up');
        }else{
            echo view('c_advertise');
        }
    }
}
