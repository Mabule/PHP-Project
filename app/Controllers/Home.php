<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $this->start();
        echo view('c_index');
    }
}
