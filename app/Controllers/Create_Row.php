<?php

namespace App\Controllers;

class Create_Row
{
    private $nb_row = 0;
    public function __construct(int $_nb_row){
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
                    $html .= "<p class=\"txt\">" . $_SESSION['annonce'][$i][$j]['title'] . "</p>";
                    if($_SESSION['annonce'][$i][$j]['exist_image']){
                        $html .= $_SESSION['annonce'][$i][$j]['image'];
                    }else{
                        $html .= "<img src=\"". $_SESSION['annonce'][$i][$j]['image'] ."\" alt=\"Photo de la maison\" class=\"max-box center-img\">";
                    }
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
}