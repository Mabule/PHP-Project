<?php
	namespace App\Controllers;
	class C_sign_up extends BaseController
	{
		public function index()
		{
			$this->start();
			if(isset($_POST['send'])){
				$var = [
					"nom" => "",
					"prenom" => "",
					"login" => "",
					"email" => "",
					"mdp" => "",
					"mdp_confirm" => "",
					"prblm" => ""
				];
				$rules = [
					'nom' => [
						'rules' => 'required|min_length[2]|max_length[255]',
						'errors' => [
							'required' => 'Veuillez fournir un nom (entre 2 et 255 caractères)',
						]
					],
					'prenom' => [
						'rules' => 'required|min_length[2]|max_length[255]',
						'errors' => [
							'required' => 'Veuillez fournir un prénom (entre 2 et 255 caractères)',
						]
					],
					'login' => [
						'rules' => 'required|min_length[2]|max_length[255]',
						'errors' => [
							'required' => 'Veuillez renseigner un pseudo valide (entre 2 255 caractères)',
						]
					],
					'email' => [
						'rules' => 'required|valid_email|max_length[255]',
						'errors' => [
							'required' => 'Veuillez renseigner un email valide (et ne pas excéder 255 caractères)',
						]
					],
					'mdp' => [
						'rules' => 'required|min_length[5]|max_length[255]',
						'errors' => [
							'required' => 'Veuillez renseigner un mot de passe valide (entre 5 255 caractères)',
						]
					],
					'mdp_confirm' => [
						'rules' => 'required|min_length[5]|max_length[255]|matches[mdp]',
						'errors' => [
							'required' => 'Les mots de passe doivent être similaire',
						]
					]
				];
				if ($this->validate($rules)) {
					$db = db_connect();
	            	$builder = $db->table('users');
	            	$tab = [
	                    'u_nom' => $_POST['nom'],
	                    'u_prenom' => $_POST['prenom'],
	                    'u_pseudo' => $_POST['login'],
	                    'u_email' => $_POST['email'],
	                    'u_mdp' => $_POST['mdp'],
	                    'u_admin' => 0
	                ];
	                $builder->where('u_email', $tab['u_email']);
                    $builder->where('u_pseudo', $tab['u_pseudo']);
                    $query = $builder->get();
	                if(count($query->getResultArray()) == 0){
	                    $builder->insert($tab);
                        $builder = $db->table('users');
                        $builder->where('u_email', $tab['u_email']);
                        $query = $builder->get();
                        $id = $query->getResultArray()[0]['u_id'];
                        $_SESSION["id"] = $id;
                        return redirect()->to(base_url()."/Home");
	                }else{
	                    $var["prblm"] = "Un compte avec ce pseudo ou avec cet email existe déjà !";
	                    echo view('c_sign_up', $var);
	                }
				} else {
					foreach($rules as $key => $val){
		                if(isset($this->validator->getErrors()[$key])){
						    $var[$key] = $val['errors']['required'];
		                }
	            	}
	            	echo view('c_sign_up', $var);
				}
			} else {
				echo view('c_sign_up');
			}
		}
	}