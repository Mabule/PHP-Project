<?php

namespace App\Controllers;

class C_annonce extends BaseController
{
    public function index()
    {
        $this->start();
            $db = db_connect();
            $builder = $db->table('advertise');
            $builder->where('d_id', $_COOKIE['advertise']);
            $query = $builder->get();
            if(count($query->getResultArray()) != 0){
                $adv = $query->getResultArray()[0];
                $annonce['advertise'] = [];
                $annonce['advertise']['advertise'] = $adv;
                //
                $builder = $db->table('pictures');
                $builder->where('p_ref_advertise', $_COOKIE['advertise']);
                $res_img = $builder->get();
                $annonce['advertise']['pictures']['p_name'] = "img\\no image.jpg";
                if(count($res_img->getResultArray()) != 0){
                    $annonce['advertise']['pictures'] = $res_img->getResultArray();
                }
                //
                $builder = $db->table('energy');
                $builder->where('e_ref_advertise', $_COOKIE['advertise']);
                $res_ene = $builder->get();
                if(count($res_ene->getResultArray()) != 0){
                    $annonce['advertise']['energy'] = $res_ene->getResultArray()[0];
                }
                //
                $builder = $db->table('house');
                $builder->where('h_ref_advertise', $_COOKIE['advertise']);
                $res_hou = $builder->get();
                if(count($res_hou->getResultArray()) != 0){
                    $annonce['advertise']['house'] = $res_hou->getResultArray()[0];
                }
                echo view('c_annonce', ["carrousel" => $this->getCarrousel($annonce), "annonce" => $annonce]);
            }else{
                return redirect()->to(base_url()."/PHP-Project/public/index/true");
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
                $html .= "<img class=\"d-block w-100\" src=\"img/" . $p['p_ref_advertise'] . "/" . basename($p['p_name']) . "\" alt=\"" . $p['p_title'] . "\">
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
