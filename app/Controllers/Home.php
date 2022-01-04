<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index($co = false)
    {
        $this->start();
        $db = db_connect();
        $builder = $db->table('advertise');
        $res_adv = $builder->get();
        $nb_annonce = 0;
        if(count($res_adv->getResultArray()) != 0){
            $annonce = [];
            $cnt = 0;
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
                $info['image'] = "img/no image.jpg";
                if(count($res_img->getResultArray()) != 0){
                    $info['exist_image'] = True;
                    $info['image'] = "img/".$res_img->getResultArray()[0]['p_ref_advertise']."/".$res_img->getResultArray()[0]['p_name'];
                    $info['alt-image'] = $res_img->getResultArray()[0]['p_title'];
                }
                $annonce[$stage][$nb] = $info;
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
        if(!isset($annonce)){
           $annonce = [];
           $nb_annonce = 0;
        }
        echo view('c_index', ["htm" => $this->getHTML($nb_annonce, $annonce), "connect" => $co]);
    }

    public function getHTML($nb_row, $annonce): string
    {
        $html = "";
        if($nb_row != 0){
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
                    if($_SESSION['annonce'][$i][$j]['exist_image']){
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
