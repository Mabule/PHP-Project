<?php

namespace App\Controllers;

class C_disconnect extends BaseController
{
    public function index()
    {
        $this->start();
        unset($_SESSION['connect']);
        echo view('c_sign_up');
    }
}
