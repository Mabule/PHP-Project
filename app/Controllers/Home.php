<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $this->start();
        if(!isset($_SESSION['connect'])){
            echo view('c_sign_up');
        }else{
            $db = db_connect();
            $builder = $db->table('house');
            $query = $builder->get();
            $_SESSION['annonce'] = 0;
            if(count($query->getResultArray()) != 0){
                $_SESSION['annonce'] = [];
                $cnt = 0;
                foreach($query->getResultArray() as $s){
                    $_SESSION['annonce'][$cnt] = $s;
                    $cnt += 1;
                }
            }
            echo view('c_index');
        }
    }
}
