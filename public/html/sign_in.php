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
	<h1>Inscription</h1>
	<form action="C_sign_in/verif_form" method="POST" class="column">
		<label>Nom :<br>
			<input type="text" placeholder="Nom" required>
		</label>
		
		<label>Prénom :<br>
			<input type="text" placeholder="Prénom" required>
		</label>
		
		<label>Pseudo :<br>
			<input type="text" placeholder="Pseudo" required>
		</label>
		
		<label>Email : <br>
			<input type="mail" placeholder="addresse.email@gmail.com" required>
		</label>
		
		<label>Mot de passe : <br>
			<input type="password" placeholder="mot_de-passe" required>
		</label>
		
		<label>Vérification	mot de passe :<br>
			<input type="password" placeholder="mot_de-passe" required>
		</label>
		
		<input type="submit" value="S'inscrire">
	</form>
	<script src="https://kit.fontawesome.com/7f62026b48.js" crossorigin="anonymous"></script>
  	<script src="js/app.js"></script>
</body>
</html>