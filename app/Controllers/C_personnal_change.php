<?php

namespace App\Controllers;

class C_personnal_change extends BaseController
{
    public function index()
    {
        $this->start();
        if(!isset($_SESSION['connect'])){
            (new C_sign_in())->index();
        }else{
            echo view('c_personnal_change');
        }
    }
}
