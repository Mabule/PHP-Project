<?php

namespace App\Controllers;

class Upload extends BaseController{
    public function index(){
        $this->start();
        if(isset($_FILES['userfile'])) {
            if ($_FILES['userfile']['size'] <= 10000000) {
                echo "Le poids est bon !";
                $p_ref_advertise = '1'; //tmp
                $p_title = "Image d'extérieur 1"; //tmp
                $upload= "img/".$p_ref_advertise; //rajouter en dossier l'id de l'annonce;
                if (!file_exists($upload) && !is_dir($upload))
                {
                    mkdir($upload,0777,false);
                }
                $upload .= "/".basename($_FILES['userfile']['name']);
                echo '<pre>';
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload)) {
                    echo "Le fichier est valide, et a été téléchargé avec succès. Voici plus d'informations :\n";
                    $db = db_connect();
                    $builder = $db->table('pictures');
                    $tab = [
                        'p_ref_advertise' => $p_ref_advertise,
                        'p_title' => $p_title,
                        'p_name' => basename($_FILES['userfile']['name'])
                    ];
                    $builder->insert($tab);
                }else{
                    echo "Attaque potentielle par téléchargement de fichiers. Voici plus d'informations :\n";
                }
                var_dump($_FILES);
                echo '</pre>';
            } else {
                echo "Le poids n'est pas bon";
            }
        }
        (new Home())->index();
    }
}