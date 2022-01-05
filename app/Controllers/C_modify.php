<?php

namespace App\Controllers;

use App\Models\M_modify;

class C_modify extends BaseController
{
    public function index(){
        $this->start();
        if(isset($_SESSION["id"])){
            $data = (new M_modify())->load_data($_SESSION["id"]);
            echo view("c_modify", ["htm" => $data]);
        }else{
            return redirect()->to(base_url()."/Home");
        }
    }
}