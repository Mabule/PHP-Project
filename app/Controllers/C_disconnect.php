<?php

namespace App\Controllers;

class C_disconnect extends BaseController
{
    public function index()
    {
        $this->start();
        unset($_SESSION['connect']);
        session_destroy();
        echo view('c_sign_up');
    }
}
