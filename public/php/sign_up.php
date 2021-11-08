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
	<form action="C_sign_up/verif_form" method="POST" class="column">
		
		<label>Pseudo :<br>
			<input type="text" placeholder="Pseudo" required>
		</label>
		
		<label>Mot de passe : <br>
			<input type="password" placeholder="mot_de-passe" required>
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