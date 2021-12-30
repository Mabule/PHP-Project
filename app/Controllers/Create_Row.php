<?php

namespace App\Controllers;

class Create_Row
{
    private $nb_row = 0;
    public function __construct(int $_nb_row = 0){
        $this->nb_row=$_nb_row;
    }

    public function getHTML(){
        $html = "";
        if($this->nb_row != 0){
            for($i = 0; $i < $this->nb_row; $i++){
                $html .= "<div class=\"grid_row\">";
                $l = count($_SESSION['annonce'][$i]);
                for($j = 0; $j < $l; $j++){
                    switch ($j){
                        case 0:
                            $html .= "<div data-id=\"" . $_SESSION['annonce'][$i][$j]['id'] . "\" class=\"advertise grid_one\">";
                            break;
                        case 1:
                            $html .= "<div data-id=\"" . $_SESSION['annonce'][$i][$j]['id'] . "\" class=\"advertise grid_two\">";
                            break;
                        case 2:
                            $html .= "<div data-id=\"" . $_SESSION['annonce'][$i][$j]['id'] . "\" class=\"advertise grid_three\">";
                            break;
                        default:
                            break;
                    }
                    $html .= "<p class=\"txt\">" . $_SESSION['annonce'][$i][$j]['title'] . "</p>
                              <img src=\"";
                    if($_SESSION['annonce'][$i][$j]['exist_image']){
                        $html .= $_SESSION['annonce'][$i][$j]['image']."\" alt=\"".$_SESSION['annonce'][$i][$j]['alt-image']."\"";
                    }else{
                        $html .= $_SESSION['annonce'][$i][$j]['image']."\" alt=\"Aucune photo\"";
                    }
                    $html .= "class=\"box-advertise center-img img-advertise img-\">";
                    $html .= "<p class=\"txt\">" . $_SESSION['annonce'][$i][$j]['adresse'] . "</p>";
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
        echo $html;
    }

    public function getCarrousel(){
        $html = "<div id=\"exemple\" class=\"carousel slide img-max-size center-img\" data-ride=\"carousel\">
                    <div class=\"carousel-inner\">";
        $cnt = 0;
        foreach ($_SESSION['advertise']['pictures'] as $p){
            $html .= "<div class=\"carousel-item crop-all";
            if($cnt == 0) {
                $html .= " active";
            }
            $html .= "\">";
            $html .= "<img class=\"d-block w-100\" src=\"img/".$p['p_ref_advertise']."/".basename($p['p_name'])."\" alt=\"".$p['p_title']."\">
                      <div class=\"carousel-caption d-none d-md-block\">
                        <h3>".$p['p_title']."</h3>
                      </div>
                    </div>";
            $cnt++;
        }
        $html .= "</div>
                  <a class=\"carousel-control-prev\" href=\"#exemple\" role=\"button\" data-slide=\"prev\">
                    <span class=\"carousel-control-prev-icon\"></span>
                  </a>
                  <a class=\"carousel-control-next\" href=\"#exemple\" role=\"button\" data-slide=\"next\">
                    <span class=\"carousel-control-next-icon\"></span>
                  </a>
                </div>";
        echo $html;
    }
}