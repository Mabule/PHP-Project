<?php

namespace App\Controllers;

class C_disconnect extends BaseController
{
    public function index()
    {
        $this->start();
        unset($_SESSION["id"]);
        return redirect()->to(base_url()."/C_sign_in");
    }
}