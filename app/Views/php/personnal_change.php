<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="author" content="Léo">
        <link rel="stylesheet" type="text/css" href="css/personnal_change.css">
	    <title>Coucou</title>
    </head>

    <body>
        <div id="Choice">
            <title>Sommaire</title>
            <ul>
                <li><a href="#info_connexion" class="lien">Informations de connexion</a></li>
                <li><a href="#info_public" class="lien">Informations publiques</a></li>
                <li><a href="#info_perso" class="lien">Informations personnels</a></li>
                <li><a href="#supprimer" class="lien">Supprimer le compte</a></li>
            </ul>
        </div>
        
        <div id="changement">
            <div id="connexion" class="groupe">
                <div class="anchre_gauche" id="info_connexion_gauche">
                    connexions
                </div>
                <div class="anchre_droite" id="info_connexion_droite">
                    Ici les infos de connexions
                </div>
            </div>

            <div id="info_public" class="groupe">
                <div class="anchre_gauche" id="info_public_gauche">
                    info publiques
                </div>
                <div class="anchre_droite" id="info_public_droite">
                    Ici les infos publiques
                </div>
            </div>

            <div id="info_perso" class="groupe">
                <div class="anchre_gauche" id="info_perso_gauche">
                    info persos
                </div>
                <div class="anchre_droite" id="info_perso_droite">
                    Ici les infos perso
                    <?php
                        global $get_user;
                        echo "Login : " . $_SESSION["login"] . "<br>";
                        echo "Mail : " . $get_user["UTI_MAIL"] . "<br>";
                        echo "Téléphone : " . $get_user["UTI_TEL"] . "<br>";
                        echo "Login : " . $get_user["UTI_LOGIN"] . "<br>";
                    ?>
                </div>
            </div>


            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            
            <div id="supprimer" class="groupe">
                <div class="anchre_gauche" id="supprimer_gauche">
                    supprimer
                </div>
                <div class="anchre_droite" id="supprimer_droite">
                    ici pour supprimer le compte
                </div>
            </div>

        </div>
    </body>
</html>
