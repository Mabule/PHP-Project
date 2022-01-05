<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mabule">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <title>Modification d'annonces</title>
</head>

<body>
<div id="onload">
    <img src="https://www.gif-maniac.com/gifs/51/50660.gif" alt="Chargement de la page" class="center-img">
</div>
<section class="presentation">
    <h1 class="w-100 txt-center c_white">Liste de vos annonces</h1>
    <div class="pannel">
        <?php if(isset($htm)) echo $htm;?>
    </div>
</section>
<script src="js/common.js"></script>
</body>
</html>