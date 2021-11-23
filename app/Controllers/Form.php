<?php

namespace App\Controllers;

class Form extends BaseController
{
    public function index()
    {
        $this->start();
        var_dump($_SESSION);
        $db = db_connect();
        //$q = $db->query('YOUR QUERY HERE');
        helper(['form', 'url']);
        var_dump($_SESSION['source']);
        if(isset($_SESSION['source'])){
            $str = $_SESSION['source'];
            var_dump($str);
        }else{
            return view('c_sign_in');
        }
        if($str == "sign_up"){
            $rules = [
                'login' => [
                    'rules' => 'required|min_length[2]',
                    'errors' => [
                        'required' => 'Veuillez renseigner un pseudo valide (2 caractères minimum)',
                    ]
                ],
                'mdp' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Veuillez renseigner un mot de passe valide (5 caractères minimum)',
                    ]
                ]
            ];
        }else if($str == "sign_in"){
            $rules = [
                'nom' => [
                    'rules' => 'required|min_length[2]',
                    'errors' => [
                        'required' => 'Veuillez renseigner un nom valide (2 caractères minimum)',
                    ]
                ],
                'prenom' => [
                    'rules' => 'required|min_length[2]',
                    'errors' => [
                        'required' => 'Veuillez renseigner un prénom valide (2 caractères minimum)',
                    ]
                ],
                'login' => [
                    'rules' => 'required|min_length[2]',
                    'errors' => [
                        'required' => 'Veuillez renseigner un pseudo valide (2 caractères minimum)',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Veuillez renseigner un email valide',
                    ]
                ],
                'mdp' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Veuillez renseigner un mot de passe valide (5 caractères minimum)',
                    ]
                ],
                'mdp_confirm' => [
                    'rules' => 'required|min_length[5]|matches[mdp]',
                    'errors' => [
                        'required' => 'Les mots de passe doivent être similaire',
                    ]
                ]
            ];
        }
        if ($this->validate($rules)) {
            $builder = $db->table('users');
            if($str == "C_sign_up"){
                $tab = [
                    'login' => $_POST['login'],
                    'password' => $_POST['mdp']
                ];
                $builder->where('u_pseudo', $tab['login']);
                $builder->where('u_mdp', $tab['password']);
            }else{
                $tab = [
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'login' => $_POST['login'],
                    'email' => $_POST['email'],
                    'password' => $_POST['mdp']
                ];
                $builder->where('u_email', $tab['email']);
            }
            $query = $builder->get();
            var_dump($query);
            echo view('c_index');
        } else {
            //echo view($str);
            print_r($this->validator);
            //$rules->showError();
        }
    }
}