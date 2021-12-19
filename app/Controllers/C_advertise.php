<?php

namespace App\Controllers;

use DOMElement;

class C_advertise extends BaseController
{
    public function index()
    {
        $this->start();
        if(!isset($_SESSION['connect'])){
            echo view('c_sign_up');
        }else{
            DOMElement::getElementsByClassName('');
            echo view('c_advertise');
        }
    }
}
