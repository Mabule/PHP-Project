<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $this->start();
        if(!isset($_SESSION['connect'])){
            echo view('c_sign_up');
        }else{
            echo view('c_index');
        }
    }
}
