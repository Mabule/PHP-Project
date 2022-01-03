<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mabule">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/sign_up.css">
    <title>Coucou</title>
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
    <form action="C_sign_up" method="POST" class="column column_center flex_center">
        <h1 class="txt-center margin-b-20">Inscription</h1>
        <p class="error">
            <?php
            if(isset($prblm) && $prblm != "")
                echo $prblm;
            ?>
        </p>
            <input type="text" placeholder="Nom" required name="nom" class="margin-b-20">
            <p class="error">
                <?php
                if(isset($nom) && $nom != "")
                    echo $nom;
                ?>
            </p>

            <input type="text" placeholder="Prénom" required name="prenom" class="margin-b-20">
            <p class="error">
                <?php
                if(isset($prenom) && $prenom != "")
                    echo $prenom;
                ?>
            </p>
            <input type="text" placeholder="Pseudo" required name="login" class="margin-b-20">
            <p class="error">
                <?php
                if(isset($login) && $login != "")
                    echo $login;
                ?>
            </p>
            <input type="email" placeholder="Email" required name="email" class="margin-b-20">
            <p class="error">
                <?php
                if(isset($email) && $email != "")
                    echo $email;
                ?>
            </p>
            <input type="password" placeholder="Mot de passe" required name="mdp" class="margin-b-20">
            <p class="error">
                <?php
                if(isset($mdp) && $mdp != "")
                    echo $mdp;
                ?>
            </p>

            <input type="password" placeholder="Vérification mot de passe" required name="mdp_confirm" class="margin-b-20">
            <p class="error">
                <?php
                if(isset($mdp_confirm) && $mdp_confirm != "")
                    echo $mdp_confirm;
                ?>
            </p>
        <input type="submit" value="S'inscrire'" class="bottom_handler" name="send">
        <p class="redirect margin-t-20">
            Vous avez déjà un compte ? Alors <u><a href="C_sign_in">connectez-vous maintenant !</a></u>
        </p>
    </form>
<script src="https://kit.fontawesome.com/7f62026b48.js" crossorigin="anonymous"></script>
<script src="js/common.js"></script>
</body>
</html>