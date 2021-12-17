<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $this->start();
        if(!isset($_POST['login'])){
            echo view('c_sign_in');
        }else{
            echo view('c_index');
        }
    }
}
