<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="author" content="Léo">
        <link rel="stylesheet" type="text/css" href="/css/personnal_change.css">
	    <title>Profil de <?php $log = $login ?? "personne"; echo $login ?></title>
    </head>

    <body>

        <div id="Choice">
            <ul>
                <li><a href="#connexion" class="lien">Informations de connexion</a></li>
                <li><a href="#info_public" class="lien">Informations publiques</a></li>
                <li><a href="#info_perso" class="lien">Informations personnels</a></li>
                <li><a href="#supprimer" class="lien">Supprimer le compte</a></li>
            </ul>
        </div>
        
        <div id="changement">
            <div id="connexion" class="groupe">
                <div class="ancre_gauche" id="info_connexion_gauche">
                    <h1>Connexion :</h1>
                </div>
                <div class="ancre_droite" id="info_connexion_droite">
                    Ici les infos de connexions<br>
                    <?php
                        echo "Pseudo :".$login."<br>";

                        if(isset($mdp))
                            echo "Mot de passe :";
                            for ($i=0; $i < strlen($mdp); $i++)
                                echo '*';
                    ?>
                </div>
            </div>

            <div id="info_public" class="groupe">
                <div class="ancre_gauche" id="info_public_gauche">
                    <h1>Info publiques :</h1>
                </div>
                <div class="ancre_droite" id="info_public_droite">
                    Ici les infos publiques<br>
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
                    <h1>informations personnelles :</h1>
                </div>
                <div class="ancre_droite" id="info_perso_droite">
                    Ici les informations personnelles
                    <?php
                        if(isset($email))
                            echo $email;
                    ?>
                </div>
            </div>
            
            <div id="supprimer" class="groupe">
                <div class="ancre_gauche" id="supprimer_gauche">
                    <h1>supprimer :</h1>
                </div>
                <div class="ancre_droite" id="supprimer_droite">
                    ici pour supprimer le compte
                    <u><a href="/C_Destroy">Supprimer (attention une fois cliqué sur le bouton, l'action est irréverssible)</a></u>
                </div>
            </div>
            <footer></footer>
        </div>
    </body>
</html>