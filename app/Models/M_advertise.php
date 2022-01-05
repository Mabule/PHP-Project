<?php

namespace App\Models;

use CodeIgniter\Model;

class M_advertise extends Model
{
    public function load_data(): array
    {
        $annonce = ["annonce" => []];
        $cnt = 0;
        $db = db_connect();
        $builder = $db->table('advertise');
        $res_adv = $builder->get();
        if(count($res_adv->getResultArray()) != 0){
            $stage = 0;
            $nb = 0;
            foreach($res_adv->getResultArray() as $s){
                $info = [];
                $info['title'] = $s['d_title'];
                $info['adresse'] = $s['d_adresse'];
                $info['id'] = $s['d_id'];
                $builder = $db->table('pictures');
                $builder->where('p_ref_advertise', $s['d_id']);
                $res_img = $builder->get();
                $info['exist_image'] = False;
                $info['image'] = "/img/no image.jpg";
                if(count($res_img->getResultArray()) != 0){
                    $info['exist_image'] = True;
                    $info['image'] = "/img/".$res_img->getResultArray()[0]['p_ref_advertise']."/".$res_img->getResultArray()[0]['p_name'];
                    $info['alt-image'] = $res_img->getResultArray()[0]['p_title'];
                }
                $annonce["annonce"][$stage][$nb] = $info;
                $cnt += 1;
                $nb += 1;
                if($cnt % 3 == 0){
                    $stage += 1;
                    $nb = 0;
                }
            }
        }
        return [ceil(count($annonce["annonce"])%3), $annonce];
    }
}