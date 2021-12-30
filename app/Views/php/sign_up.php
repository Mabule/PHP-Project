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
<body class="column column_center">
<h1>Inscription</h1>
<form action="Form" method="POST" class="column">
    <p class="error">
        <?php
        if(isset($_SESSION['already_exist']) && $_SESSION['already_exist'] != "")
            echo $_SESSION['already_exist'];
        ?>
    </p>
    <label>Nom :<br>
        <input type="text" placeholder="Nom" required name="nom">
        <p class="error">
            <?php
            if(isset($_SESSION['nom']) && $_SESSION['nom'] != "")
                echo $_SESSION['nom'];
            ?>
        </p>
    </label>

    <label>Prénom :<br>
        <input type="text" placeholder="Prénom" required name="prenom">
        <p class="error">
            <?php
            if(isset($_SESSION['prenom']) && $_SESSION['prenom'] != "")
                echo $_SESSION['prenom'];
            ?>
        </p>
    </label>

    <label>Pseudo :<br>
        <input type="text" placeholder="Pseudo" required name="login">
        <p class="error">
            <?php
            if(isset($_SESSION['login']) && $_SESSION['login'] != "")
                echo $_SESSION['login'];
            ?>
        </p>
    </label>

    <label>Email : <br>
        <input type="email" placeholder="addresse.email@gmail.com" required name="email">
        <p class="error">
            <?php
            if(isset($_SESSION['email']) && $_SESSION['email'] != "")
                echo $_SESSION['email'];
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

    <label>Vérification	mot de passe :<br>
        <input type="password" placeholder="mot_de-passe" required name="mdp_confirm">
        <p class="error">
            <?php
            if(isset($_SESSION['mdp_confirm']) && $_SESSION['mdp_confirm'] != "")
                echo $_SESSION['mdp_confirm'];
            ?>
        </p>
    </label>
    <input type="submit" value="S'inscrire" class="bottom_handler" name="send">
</form>
<p class="redirect">
    Vous avez déjà un compte ? Alors <a href="C_sign_in">connectez-vous maintenant !</a>
</p>
<script src="https://kit.fontawesome.com/7f62026b48.js" crossorigin="anonymous"></script>
<script src="js/common.js"></script>
</body>
</html>