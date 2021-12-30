<?php

namespace App\Controllers;

class C_annonce extends BaseController
{
    public function index()
    {
        $this->start();
            $db = db_connect();
            $builder = $db->table('advertise');
            $builder->where('d_id', $_COOKIE['advertise']);
            $query = $builder->get();
            if(count($query->getResultArray()) != 0){
                $adv = $query->getResultArray()[0];
                $_SESSION['advertise'] = [];
                $_SESSION['advertise']['advertise'] = $adv;
                //
                $builder = $db->table('pictures');
                $builder->where('p_ref_advertise', $_COOKIE['advertise']);
                $res_img = $builder->get();
                $_SESSION['advertise']['pictures']['p_name'] = "img\\no image.jpg";
                if(count($res_img->getResultArray()) != 0){
                    $_SESSION['advertise']['pictures'] = $res_img->getResultArray();
                }
                //
                $builder = $db->table('energy');
                $builder->where('e_ref_advertise', $_COOKIE['advertise']);
                $res_ene = $builder->get();
                if(count($res_ene->getResultArray()) != 0){
                    $_SESSION['advertise']['energy'] = $res_ene->getResultArray()[0];
                }
                //
                $builder = $db->table('house');
                $builder->where('h_ref_advertise', $_COOKIE['advertise']);
                $res_hou = $builder->get();
                if(count($res_hou->getResultArray()) != 0){
                    $_SESSION['advertise']['house'] = $res_hou->getResultArray()[0];
                }
                echo view('c_annonce');
            }else{
                (new Home())->index();
            }

    }
}
