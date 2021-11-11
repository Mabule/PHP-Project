<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        session_start();
        if(!isset($_POST['login'])){
            return view('c_sign_in');
        }else{
            return view('c_index');
        }
    }
}
