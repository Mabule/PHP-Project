<?php

namespace App\Controllers;

//use DOMElement;

class C_advertise extends BaseController
{
    public function index()
    {
        $this->start();
        //DOMElement::getElementsByClassName('');
        echo view('c_advertise');
    }
}
