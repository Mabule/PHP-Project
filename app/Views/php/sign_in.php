<!DOCTYPE html>
<html lang="fr">
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
	<h1>Inscription</h1>
	<form action="Form" method="POST" class="column">
		<label>Nom :<br>
			<input type="text" placeholder="Nom" required name="nom">
		</label>
		
		<label>Prénom :<br>
			<input type="text" placeholder="Prénom" required name="prenom">
		</label>
		
		<label>Pseudo :<br>
			<input type="text" placeholder="Pseudo" required name="login">
		</label>
		
		<label>Email : <br>
			<input type="email" placeholder="addresse.email@gmail.com" required name="email">
		</label>
		
		<label>Mot de passe : <br>
			<input type="password" placeholder="mot_de-passe" required name="mdp">
		</label>
		
		<label>Vérification	mot de passe :<br>
			<input type="password" placeholder="mot_de-passe" required name="mdp_confirm">
		</label>
		<div class="row">
			<input type="submit" value="S'inscrire" class="bottom_handler" name="send">
			<a href="C_sign_up" class="bottom_handler">Se connecter</a>
		</div>
	</form>
	<script src="https://kit.fontawesome.com/7f62026b48.js" crossorigin="anonymous"></script>
  	<script src="js/app.js"></script>
</body>
</html>