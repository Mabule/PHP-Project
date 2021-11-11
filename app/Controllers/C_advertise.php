<?php

namespace App\Controllers;

class C_advertise extends BaseController
{
    public function index()
    {
        if(!isset($_POST['login'])){
            return view('c_sign_in');
        }else{
            return view('c_advertise');
        }
    }
}
