<?php

namespace App\Controllers;

use App\Models\M_home;

class Home extends BaseController
{
    public function index()
    {
        $this->start();
        $data = (new M_Home())->load_data();
        echo view('c_index', ["htm" => $this->getHTML($data[0], $data[1])]);
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
