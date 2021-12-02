<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Mabule">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/sign_in.css">
	<title>Coucou</title>
</head>
<body class="column column_center">
	<h1>Connexion</h1>
	<form action="Form" method="POST" class="column">
		<p class="error">
			<?php
				if(isset($_SESSION['non-existant_account']) && $_SESSION['non-existant_account'] != "")
					echo $_SESSION['non-existant_account']; 
			?>
		</p>
		<label>Pseudo :<br>
			<input type="text" placeholder="Pseudo" required name="login">
			<p class="error">
			<?php 
				if(isset($_SESSION['login']) && $_SESSION['login'] != "")
					echo $_SESSION['login']; 
			?>
			</p>
		</label>
		
		<label>Mot de passe : <br>
			<input type="password" placeholder="mot_de-passe" required name="mdp">
			<p class="error">
			<?php 
				if(isset($_SESSION['mdp']) && $_SESSION['mdp'] != "")
					echo $_SESSION['mdp']; 
				?>
			</p>
		</label>

		<div class="row">
			<input type="submit" value="Se connecter" class="bottom_handler">
			<a href="C_sign_in" class="bottom_handler">S'inscrire</a>
		</div>
	</form>
	<script src="https://kit.fontawesome.com/7f62026b48.js" crossorigin="anonymous"></script>
  	<script src="js/app.js"></script>
</body>
</html>