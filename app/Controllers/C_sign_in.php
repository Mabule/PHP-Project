<?php

namespace App\Controllers;

class C_sign_in extends BaseController
{
    public function index()
    {
        $this->start();
        if(isset($_POST['send'])){
            $rules = [
                'login' => [
                    'rules' => 'required|min_length[2]',
                    'errors' => [
                        'required' => 'Veuillez renseigner un pseudo valide (2 caractères minimum, 255 caractères maximum)',
                    ]
                ],
                'mdp' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Veuillez renseigner un mot de passe valide (5 caractères minimum, 255 caractères maximum)',
                    ]
                ]
            ];
            $var = [
                "login" => "",
                "mdp" => "",
                "prblm" => ""
            ];
            if ($this->validate($rules)) {
                $db = db_connect();
                $builder = $db->table('users');
                $tab = [
                    'u_pseudo' => $_POST['login'],
                    'u_mdp' => $_POST['mdp']
                ];
                $builder->where('u_pseudo', $tab['u_pseudo']);
                $builder->where('u_mdp', $tab['u_mdp']);
                $query = $builder->get();
                if(count($query->getResultArray()) == 1) {
                    $id = $query->getResultArray()[0]['u_id'];
                    $_SESSION["id"] = $id;
                    return redirect()->to(base_url()."/Home");
                }else{
                    $var["prblm"] = "Mauvais pseudo et/ou mauvais mot de passe";
                    if(count($query->getResultArray()) == 1){
                        $var["prblm"] = "Mauvais mot de passe";
                    }
                    echo view('c_sign_in', $var);
                }
            }else {
                foreach($rules as $key => $val){
                    if(isset($this->validator->getErrors()[$key])){
                        $var[$key] = $val['errors']['required'];
                    }
                }
                echo view('c_sign_in', $var);
            }
        }else{
            echo view('c_sign_in');
        }
    }
}
