<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Form extends Controller
{
    public function index()
    {
        $db = db_connect();
        //$q = $db->query('YOUR QUERY HERE');
        helper(['form', 'url']);
        $str = explode('/', $_SERVER['HTTP_REFERER'])[5];
        $array =  \Config\Services::validation();
        if($str == "C_sign_up"){
            $array->setRules([
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
            ]);
        }else if($str == "C_sign_in"){
            $array->setRules([
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
            ]);
        }
        if ($this->validate($array->getRules())) {
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
            echo view('c_index', ['validation' => $this->validator,]);
        } else {
            //echo view($str);
            $array->showError();
        }
    }
}