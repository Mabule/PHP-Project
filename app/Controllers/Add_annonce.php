<?php

namespace App\Controllers;

class Add_annonce extends BaseController
{
    public function index(){
        $this->start();
        if(isset($_POST['send'])){
            $var = [
                "title" => "",
                "price_rent" => "",
                "price_taxe" => "",
                "type_heating" => "",
                "size" => "",
                "description" => "",
                "adresse" => "",
                "city" => "",
                "CP" => "",
                "succes" => ""
            ];
            $rules = [
                'title' => [
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required' => 'Veuillez fournir un titre valide (entre 5 et 20 caractères)',
                    ]
                ],
                'price_rent' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Veuillez fournir le montant du loyer',
                    ]
                ],
                'price_taxe' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Veuillez fournir le montant des taxes (si égale à 0 alors écrire 0)',
                    ]
                ],
                'type_heating' => [
                    'rules' => 'required|max_length[10]',
                    'errors' => [
                        'required' => 'Veuillez fournir un type de chauffage valide',
                    ]
                ],
                'size' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Veuillez fournir une surface',
                    ]
                ],
                'description' => [
                    'rules' => 'required|min_length[15]|max_length[248]',
                    'errors' => [
                        'required' => 'Veuillez fournir une description du bien en utilisant entre 15 et 248 caractères',
                    ]
                ],
                'adresse' => [
                    'rules' => 'required|max_length[100]',
                    'errors' => [
                        'required' => 'Veuillez fournir une adresse (pas plus de 100 caractères)',
                    ]
                ],
                'city' => [
                    'rules' => 'required|max_length[30]',
                    'errors' => [
                        'required' => 'Veuillez fournir une ville (pas plus de 30 caractères)',
                    ]
                ],
                'CP' => [
                    'rules' => 'required|min_length[5]|max_length[5]',
                    'errors' => [
                        'required' => 'Veuillez fournir un code postale valide',
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $db = db_connect();
                $builder = $db->table('advertise');
                $tab = [
                    'd_ref_users' => "",
                    'd_title' => $_POST['title'],
                    'd_price_rent' => $_POST['price_rent'],
                    'd_price_taxe' => $_POST['price_taxe'],
                    'd_type_heating' => $_POST['type_heating'],
                    'd_size' => $_POST['size'],
                    'd_description' => $_POST['description'],
                    'd_adresse' => $_POST['adresse'],
                    'd_city' => $_POST['city'],
                    'd_CP' => $_POST['CP']
                ];
                $l = ["individuel", "collectif", "aucun"];
                if(in_array($tab["d_type_heating"], $l)){
                    $builder->insert($tab);
                    $var["succes"] = "L'annonce a bien été enregistré"
                }else{
                    $var["type_heating"] = "Type de chauffage invalde";
                    echo view('c_add_annonce', $var);
                }
            } else {
                foreach($rules as $key => $val){
                    if(isset($this->validator->getErrors()[$key])){
                        $var[$key] = $val['errors']['required'];
                    }
                }
                echo view('c_add_annonce', $var);
            }
        } else {
            echo view("c_add_annonce");
        }
    }

    public function upload(){
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
    }
}