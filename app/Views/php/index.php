<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Mabule">
	<link rel="stylesheet" type="text/css" href="/css/common.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Accueil</title>
</head>

<body>
<div id="onload">
    <img src="https://www.gif-maniac.com/gifs/51/50660.gif" alt="Chargement de la page" class="center-img">
</div>
	<section class="presentation">
        <form method="post" enctype="multipart/form-data" action="Upload">
            <input type="file" name="userfile" accept=".jpg, .jpeg, .png">
            <input type="submit" value="Envoyer">
        </form>
		<div class="pannel">  
            <?php
                if(isset($htm)){
                    echo $htm;
                }else{
                    echo "<p>Une erreur a été rencontrée... Veuillez recharger la page ou revenir plus tard sur le site web</p>>";
                }
            ?>
		</div>
	</section>
    <script src="/js/common.js"></script>
	<script src="/js/annonce.js"></script>
    <script src="js/common.js"></script>
    <script src="js/annonce.js"></script>
</body>
</html>