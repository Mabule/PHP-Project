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
						'rules' => 'required|min_length[2]',
						'errors' => [
							'required' => 'Veuillez renseigner un nom valide (2 caractères minimum, 255 caractères maximum)',
						]
					],
					'prenom' => [
						'rules' => 'required|min_length[2]',
						'errors' => [
							'required' => 'Veuillez renseigner un prénom valide (2 caractères minimum, 255 caractères maximum)',
						]
					],
					'login' => [
						'rules' => 'required|min_length[2]',
						'errors' => [
							'required' => 'Veuillez renseigner un pseudo valide (2 caractères minimum, 255 caractères maximum)',
						]
					],
					'email' => [
						'rules' => 'required|valid_email',
						'errors' => [
							'required' => 'Veuillez renseigner un email valide (et ne pas exéder 255 caractères)',
						]
					],
					'mdp' => [
						'rules' => 'required|min_length[5]',
						'errors' => [
							'required' => 'Veuillez renseigner un mot de passe valide (5 caractères minimum, 255 caractères maximum)',
						]
					],
					'mdp_confirm' => [
						'rules' => 'required|min_length[5]|matches[mdp]',
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
	                if(count($query->getResultArray()) == 0){
	                    $builder->insert($tab);
	                    //$_SESSION['connect'] = True;
	                    //$_SESSION['who'] = $tab['u_pseudo'];
	                    return redirect()->to(base_url()."/PHP-Project/public/");
	                }else{
	                    $var["prblm"] = "Un compte avec cet email existe déjà !";
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