<?php

namespace App\Models;

use CodeIgniter\Model;

class M_modify extends Model
{
    public function load_data($id) : string{
        $annonce = [
            "annonce" => []
        ];
        $html = "";

        //Connection to the database
        $db = db_connect();

        //check if the person already create advertise
        $builder = $db->table('advertise');
        $builder->where('d_ref_users', $id);
        $res_adv = $builder->get();
        if(count($res_adv->getResultArray()) !== 0){
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
            }

            /////////
            $nb_row = count($annonce["annonce"]);
            for($i = 0; $i < $nb_row; $i++){
                $html .= "<div class=\"grid_row\">";
                $l = count($annonce['annonce'][$i]);
                for($j = 0; $j < $l; $j++){
                    switch ($j){
                        case 0:
                            $html .= "<div data-id=\"" . $annonce['annonce'][$i][$j]['id'] . "\" class=\"advertise grid_one\">";
                            break;
                        case 1:
                            $html .= "<div data-id=\"" . $annonce['annonce'][$i][$j]['id'] . "\" class=\"advertise grid_two\">";
                            break;
                        case 2:
                            $html .= "<div data-id=\"" . $annonce['annonce'][$i][$j]['id'] . "\" class=\"advertise grid_three\">";
                            break;
                        default:
                            break;
                    }
                    $html .= "<p class=\"txt\">" . $annonce['annonce'][$i][$j]['title'] . "</p>
                              <img src=\"";
                    if($annonce['annonce'][$i][$j]['exist_image']){
                        $html .= $annonce['annonce'][$i][$j]['image']."\" alt=\"".$annonce['annonce'][$i][$j]['alt-image']."\"";
                    }else{
                        $html .= $annonce['annonce'][$i][$j]['image']."\" alt=\"Aucune photo\"";
                    }
                    $html .= "class=\"box-advertise center-img img-advertise img-\">";
                    $html .= "<p class=\"txt\">" . $annonce['annonce'][$i][$j]['adresse'] . "</p>";
                    $html .= "</div>";
                }
                $html .= "</div>";
            }
        }else{
            $html .= "<div class=\"grid_row\">
                        <div class=\"advertise grid_two\">
                            Aucune annonce
                        </div>
                      </div>";
        }
        return $html;
    }
}