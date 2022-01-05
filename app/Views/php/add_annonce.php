<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mabule">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/add_annonce.css">
    <title>Accueil</title>
</head>

<body>
<div id="onload">
    <img src="https://www.gif-maniac.com/gifs/51/50660.gif" alt="Chargement de la page" class="center-img">
</div>
<main class="margin-t-40">
<form action="Add_annonce" method="POST" class="column column_center flex_center">
    <h1 class="txt-center margin-b-20">Publier une annonce</h1>
    <p class="succes">
        <?php
        if(isset($succes) && $succes != "")
            echo $succes;
        ?>
    </p>
    <p class="error">
        <?php
        if(isset($prblm) && $prblm != "")
            echo $prblm;
        ?>
    </p>
    <input type="text" placeholder="Titre" required name="title" class="margin-b-20">
    <p class="error">
        <?php
        if(isset($title) && $title != "")
            echo $title;
        ?>
    </p>

    <input type="text" placeholder="Description" required name="description" class="margin-b-20">
    <p class="error">
        <?php
        if(isset($description) && $description != "")
            echo $description;
        ?>
    </p>
    <label>Montant du loyer</label>
    <input type="number" placeholder="690" required name="price_rent" class="margin-b-20">
    <p class="error">
        <?php
        if(isset($price_rent) && $price_rent != "")
            echo $price_rent;
        ?>
    </p>
    <label>Montant des taxes</label>
    <input type="number" placeholder="135" required name="price_taxe" class="margin-b-20">
    <p class="error">
        <?php
        if(isset($price_taxe) && $price_taxe != "")
            echo $price_taxe;
        ?>
    </p>
    <label>Type de chauffage</label>
    <select required name="type_heating" class="margin-b-20">
        <option>Collectif</option>
        <option>Individuel</option>
    </select>
    <p class="error">
        <?php
        if(isset($type_heating) && $type_heating != "")
            echo $type_heating;
        ?>
    </p>
    <label>Surface (en m²)</label>
    <input type="number" placeholder="54" required name="size" class="margin-b-20">
    <p class="error">
        <?php
        if(isset($size) && $size != "")
            echo $size;
        ?>
    </p>
    <label>Type d'habitation</label>
    <select required name="house" class="margin-b-20">
        <option>T1</option>
        <option>T2</option>
        <option>T3</option>
        <option>T4</option>
        <option>T5</option>
        <option>T6</option>
    </select>
    <p class="error">
        <?php
        if(isset($house) && $house != "")
            echo $house;
        ?>
    </p>
    <input type="text" placeholder="Adresse" required name="adresse" class="margin-b-20">
    <p class="error">
        <?php
        if(isset($adresse) && $adresse != "")
            echo $adresse;
        ?>
    </p>
    <input type="text" placeholder="Ville" required name="city" class="margin-b-20">
    <p class="error">
        <?php
        if(isset($city) && $city != "")
            echo $city;
        ?>
    </p>
    <label>Code postale</label>
    <input type="number" placeholder="13000" required name="CP" class="margin-b-20">
    <p class="error">
        <?php
        if(isset($CP) && $CP != "")
            echo $CP;
        ?>
    </p>
    <input type="submit" value="Publier l'annonce" class="bottom_handler" name="send">
</form>
</main>
<script src="js/common.js"></script>
</body>
</html>