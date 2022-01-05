<?php

namespace App\Controllers;

use App\Models\M_annonce;

class C_annonce extends BaseController
{
    public function index($id = 0)
    {
        $this->start();
        if($id != 0){
            $data = (new M_annonce())->load_data($id);
            if($data !== null){
                echo view('c_annonce', ["carrousel" => $this->getCarrousel($data), "annonce" => $data]);
            }else{
                return redirect()->to(base_url()."/Home");
            }
        }else{
            return redirect()->to(base_url()."/Home");
        }
    }

    public function getCarrousel($annonce){
        if(count($annonce['advertise']['pictures']) > 1) {
            $html = "<div id=\"exemple\" class=\"carousel slide img-max-size center-img\" data-ride=\"carousel\">
                        <div class=\"carousel-inner\">";
            $cnt = 0;
            foreach ($annonce['advertise']['pictures'] as $p) {
                $html .= "<div class=\"carousel-item crop-all";
                if ($cnt == 0) {
                    $html .= " active";
                }
                $html .= "\">";
                $html .= "<img class=\"d-block w-100\" src=\"/img/" . $p['p_ref_advertise'] . "/" . basename($p['p_name']) . "\" alt=\"" . $p['p_title'] . "\">
                          <div class=\"carousel-caption d-none d-md-block\">
                            <h3>" . $p['p_title'] . "</h3>
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
        } else {
            $html = "<img src=\"" . $annonce['advertise']['pictures']['p_name'] . "\" alt=\"Aucune image trouvée\" class=\"img-max-size center-img\">";
        }
        return $html;
    }
}
