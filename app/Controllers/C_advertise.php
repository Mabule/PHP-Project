<?php

namespace App\Controllers;

use App\Models\M_advertise;

class C_advertise extends BaseController
{
    public function index()
    {
        $this->start();
        $data = (new M_advertise())->load_data();
        echo view('c_advertise', ["htm" => $this->getHTML($data[0], $data[1])]);
    }

    public function getHTML($nb_row, $annonce){
        $html = "";
        if($nb_row != 0){
            for($i = 0; $i < $nb_row; $i++){
                $html .= "<div class=\"grid_row";
                if($i > 5){
                    $html .= " hidden";
                }
                $html .= "\">";
                $l = count($annonce["annonce"][$i]);
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
