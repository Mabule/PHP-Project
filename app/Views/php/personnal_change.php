<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="author" content="Léo">
        <link rel="stylesheet" type="text/css" href="css/personnal_change.css">
	    <title>Profil de <?php $log = $login ?? "personne"; echo $log ?></title>
    </head>

    <body>
    <div id="onload">
        <img src="https://www.gif-maniac.com/gifs/51/50660.gif" alt="Chargement de la page" class="center-img">
    </div>
        <div id="Choice">
            <ul>
                <li class="underline"><a href="#connexion" class="lien">Informations de connexion</a></li>
                <li class="underline"><a href="#info_public" class="lien">Informations publiques</a></li>
                <li class="underline"><a href="#info_perso" class="lien">Informations personnels</a></li>
                <li class="underline"><a href="#supprimer" class="lien">Supprimer le compte</a></li>
            </ul>
        </div>
        
        <div id="changement">
            <div id="connexion" class="groupe">
                <div class="ancre_gauche" id="info_connexion_gauche">
                    <h1>Connexion :</h1>
                </div>
                <div class="ancre_droite" id="info_connexion_droite">
                    <?php
                        echo "Pseudo :".$log."<br>";

                        if(isset($mdp)) {
                            echo "Mot de passe :";
                            for ($i = 0; $i < strlen($mdp); $i++)
                                echo '*';
                        }
                    ?>
                </div>
            </div>

            <div id="info_public" class="groupe">
                <div class="ancre_gauche" id="info_public_gauche">
                    <h1>Informations publiques :</h1>
                </div>
                <div class="ancre_droite" id="info_public_droite">
                    <?php
                        if(isset($nom))
                            echo "Nom :".$nom."<br>";
                        if(isset($prenom))
                            echo "Prénom :".$prenom;
                    ?>
                </div>
            </div>

            <div id="info_perso" class="groupe">
                <div class="ancre_gauche" id="info_perso_gauche">
                    <h1>Informations personnelles :</h1>
                </div>
                <div class="ancre_droite" id="info_perso_droite">
                    <?php
                        if(isset($email))
                            echo "Email :".$email;
                    ?>
                </div>
            </div>
            
            <div id="supprimer" class="groupe">
                <div class="ancre_gauche" id="supprimer_gauche">
                    <h1>Supprimer :</h1>
                </div>
                <div class="ancre_droite" id="supprimer_droite">
                    <u>
                        <a href="<?php echo base_url(); ?>/C_Destroy">
                            Supprimer (attention une fois cliqué sur le bouton, l'action est irréverssible)
                        </a>
                    </u>
                </div>
            </div>
        </div>
    <script src="js/common.js"></script>
    </body>
</html>