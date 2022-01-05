<?php

namespace App\Models;

use CodeIgniter\Model;

class M_annonce extends Model
{
    public function load_data($id): ?array
    {
        //Connection to the database
        $db = db_connect();

        //Getting the advertise that was clicked on
        $builder = $db->table('advertise');
        $builder->where('d_id', $id);
        $query = $builder->get();

        //Verif if an advertise exist with this id
        if(count($query->getResultArray()) !== 1){
            return null;
        }
        $adv = $query->getResultArray()[0];
        //////////////////

        $annonce['advertise'] = [];
        $annonce['advertise']['advertise'] = $adv;

        //Getting the picture of the advertise
        $builder = $db->table('pictures');
        $builder->where('p_ref_advertise', $_COOKIE['advertise']);
        $res_img = $builder->get();
        $annonce['advertise']['pictures']['p_name'] = "/img\\no image.jpg";
        if(count($res_img->getResultArray()) != 0){
            $annonce['advertise']['pictures'] = $res_img->getResultArray();
        }

        //Gettig the type of energy of the advertise
        $builder = $db->table('energy');
        $builder->where('e_ref_advertise', $_COOKIE['advertise']);
        $res_ene = $builder->get();
        if(count($res_ene->getResultArray()) != 0){
            $annonce['advertise']['energy'] = $res_ene->getResultArray()[0];
        }

        //Getting the type of location of the advertise
        $builder = $db->table('house');
        $builder->where('h_ref_advertise', $_COOKIE['advertise']);
        $res_hou = $builder->get();
        if(count($res_hou->getResultArray()) != 0){
            $annonce['advertise']['house'] = $res_hou->getResultArray()[0];
        }

        return $annonce;
    }
}