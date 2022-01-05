<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mabule">
    <link rel="stylesheet" type="text/css" href="/css/common.css">
    <link rel="stylesheet" type="text/css" href="/css/form.css">
    <link rel="stylesheet" type="text/css" href="/css/sign_in.css">
    <title>Connexion</title>
</head>
<body>
<div id="onload">
    <img src="https://www.gif-maniac.com/gifs/51/50660.gif" alt="Chargement de la page" class="center-img">
</div>
<main class="row">
    <div class="banner">
        <img src="https://www.justifit.fr/wp-content/uploads/2021/07/Litige-avec-une-agence-immobiliere-quels-sont-les-recours.jpg" alt="Image de recherche immobilière" class="img-banner"/>
        <div class="voile"></div>
        <h3 class="header-banner c_white">Trouvez <u>votre</u> propriété au <u>meilleur prix</u></h3>
        <h4 class="text-banner c_white">Rejoignez nous afin de parcourir recherchez votre futur bien parmi de nombreuses annonces</h4>
    </div>
    <form action="C_sign_in" method="POST" class="column column_center flex_center">
        <h1 class="txt-center margin-b-20">Connexion</h1>
        <p class="error">
            <?php
            if(isset($prblm) && $prblm != "")
                echo $prblm;
            ?>
        </p>
        <input type="text" placeholder="Pseudo" required name="login" class="margin-b-20">
        <p class="error">
            <?php
            if(isset($login) && $login != "")
                echo $login;
            ?>
        </p>

        <input type="password" placeholder="Mot de passe" required name="mdp" class="margin-b-20">
        <p class="error">
            <?php
            if(isset($mdp) && $mdp != "")
                echo $mdp;
            ?>
        </p>

        <input type="submit" value="Se connecter" class="bottom_handler" name="send">
        <p class="redirect margin-t-20">
            Vous n'avez pas encore de compte ? Alors n'hésitez pas à <u><a href="/C_sign_up">vous inscrire maintenant !</a></u>
        </p>
    </form>
</main>
<script src="/js/common.js"></script>
</body>
</html>