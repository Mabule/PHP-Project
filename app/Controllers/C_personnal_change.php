<?php

namespace App\Controllers;

class C_personnal_change extends BaseController
{
    public function index()
    {
        $this->start();
        if(!isset($_SESSION['connect'])){
            echo view('c_sign_up');
        }else{
            echo view('c_personnal_change');
        }
    }
}
