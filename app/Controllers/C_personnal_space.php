<?php

namespace App\Controllers;

class C_personnal_space extends BaseController
{
    public function index()
    {
        if(!isset($_POST['login'])){
            return view('c_sign_in');
        }else{
            return view('c_personnal_space');
        }
    }
}
