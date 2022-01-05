<?php

namespace App\Controllers;

class C_personnal_space extends BaseController
{
    public function index()
    {
        $this->start();
        if(isset($_SESSION["id"])){
            echo view('c_personnal_space');
        }else{
            return redirect()->to(base_url()."/Home");
        }
    }
}
