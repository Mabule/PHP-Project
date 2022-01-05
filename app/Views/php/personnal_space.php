<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Mabule">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/personnal_space.css">
	<title>Modifier son profil</title>
</head>
<body>
<div id="onload">
    <img src="https://www.gif-maniac.com/gifs/51/50660.gif" alt="Chargement de la page" class="center-img">
</div>
	<div id = "imgDroite" class="img" alt="Bannière de droite"></div>

	<div id = "imgGauche" class="img" alt="Bannière de gauche"></div>

	<div id="Texte" class="row column flex-between">
		<div id="Profil" class="row column">
			<h2>Gestion de votre profil</h2>
            <ul class="margin-t-20">
                <li><a href="<?php echo base_url(); ?>/C_personnal_change" >Modifier son profil</a></li>
            </ul>
		</div>

		<div id="Annonce" class="row column">
			<h2>Gestion des annonces</h2>
            <ul class="margin-t-20">
                <li><a href="<?php echo base_url(); ?>/Add_annonce">Créer une annonce</a></li>
                <li><a href="<?php echo base_url(); ?>/C_modify">Modifier les annonces</a></li>
            </ul>
		</div>
	</div>
    <script src="js/common.js"></script>
</body>
</html>