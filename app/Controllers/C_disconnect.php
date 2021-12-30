<?php

namespace App\Controllers;

class C_disconnect extends BaseController
{
    public function index()
    {
        $this->start();
        unset($_SESSION['connect']);
        session_destroy();
        (new C_sign_in())->index();
    }
}
