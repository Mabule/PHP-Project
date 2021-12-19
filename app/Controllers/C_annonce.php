<?php

namespace App\Controllers;

class C_annonce extends BaseController
{
    public function index()
    {
        $this->start();
        if(!isset($_SESSION['connect'])){
            echo view('c_sign_up');
        }else{
            $db = db_connect();
            $builder = $db->table('advertise');
            $builder->where('d_id', $_COOKIE['advertise']);
            $query = $builder->get();
            if(count($query->getResultArray()) != 0){
                $adv = $query->getResultArray()[0];
                $_SESSION['advertise'] = [];
                $_SESSION['advertise']['title'] = $adv['d_title'];
                $_SESSION['advertise']['adresse'] = $adv['d_adresse'];
                $_SESSION['advertise']['description'] = $adv['d_description'];
                $builder = $db->table('pictures');
                $builder->where('p_ref_advertise', $_COOKIE['advertise']);
                $res_img = $builder->get();
                $_SESSION['advertise']['image'] = "img\\no image.jpg";
                if(count($res_img->getResultArray()) != 0){
                    $_SESSION['advertise']['image'] = $res_img->getResultArray()['p_name'];
                }
                echo view('c_annonce');
            }else{
                (new Home())->index();
            }
        }
    }
}
