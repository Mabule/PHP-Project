<?php

namespace App\Controllers;

class C_personnal_space extends BaseController
{
    public function index()
    {
        $this->start();
        if(!isset($_POST['login'])){
            echo view('c_sign_in');
        }else{
            echo view('c_personnal_space');
        }
    }
}
