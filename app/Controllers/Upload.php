<?php

namespace App\Controllers;

class Upload extends BaseController{
    public function index(){
        $this->start();
        var_dump($_FILES);
        if(isset($_FILES['userfile'])) {
            if ($_FILES['userfile']['size'] <= 10000000) {
                echo "Le poids est bon !";
                $upload= "img/";
                $upload .= basename($_FILES['userfile']['name']);
                echo '<pre>';
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload)) {
                    echo "Le fichier est valide, et a été téléchargé avec succès. Voici plus d'informations :\n";
                }else{
                    echo "Attaque potentielle par téléchargement de fichiers. Voici plus d'informations :\n";
                }
                echo 'Voici quelques informations de débogage :';
                print_r($_FILES);
                echo '</pre>';
            } else {
                echo "Le poids n'est pas bon";
            }
        }
    }
}