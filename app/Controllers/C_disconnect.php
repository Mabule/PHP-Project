<?php

namespace App\Controllers;

class C_disconnect extends BaseController
{
    public function index()
    {
        $this->start();
        return redirect()->to(base_url()."/PHP-Project/public/C_sign_in");
    }
}
