<?php

namespace App\Controllers;

use App\Models\M_personnal_change;

class C_personnal_change extends BaseController
{
    public function index()
    {
        $this->start();
        if(isset($_SESSION["id"])){
            $data = (new M_personnal_change())->load_data($_SESSION["id"]);
            echo view('c_personnal_change', $data);
        }else{
            return redirect()->to(base_url()."/Home");
        }
    }
}
