<?php

namespace App\Controllers;

class C_sign_in extends BaseController
{
    public function index()
    {
        $this->start();
        echo view('c_sign_in');
    }
}
