<?php

namespace App\Models;

use CodeIgniter\Model;

class M_home extends Model
{
    public function load_data(): array
    {
        $annonce = [
            "annonce" => []
        ];

        //Connection to the database
        $db = db_connect();

        //check if there already some advertises
        $builder = $db->table('advertise');
        $res_adv = $builder->get();
        if(count($res_adv->getResultArray()) != 0){
            $cnt = 0;
            $stage = 0;
            $nb = 0;

            //Loop in all the advertise there are
            foreach($res_adv->getResultArray() as $s){

                //Stock them
                $info = [
                    "title" =>$s['d_title'],
                    "adresse" => $s['d_adresse'],
                    "id" => $s['d_id']
                ];

                //Verify if there is or not pictures for this advertise
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

                //Calcul to know the number of advertise that we've see, number of row to print, ...
                $annonce["annonce"][$stage][$nb] = $info;
                $cnt += 1;
                $nb += 1;
                if($cnt % 3 == 0){
                    $stage += 1;
                    $nb = 0;
                }
                if($cnt == 6){
                    break;
                }
            }
        }
        return [ceil(count($annonce["annonce"])%3), $annonce];
    }
}