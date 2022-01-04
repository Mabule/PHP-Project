<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mabule">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/annonce.css">
    <title>
        <?php
        if(isset($annonce))
            echo $annonce['advertise']['advertise']['d_title'];
        ?></title>
    <script src="https://kit.fontawesome.com/7f62026b48.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include 'header.php';
    ?>
<div id="onload">
    <img src="https://www.gif-maniac.com/gifs/51/50660.gif" alt="Chargement de la page" class="center-img">
</div>
<section class="presentation">
    <div class="pannel">
        <h1 class="font-maj title"><?php echo $annonce['advertise']['advertise']['d_title'] ?></h1>
        <?php
            if(isset($carrousel)){
                echo $carrousel;
            }
        ?>
        <p class="font-maj margin-t-20 adresse-advertise">
            <?php echo $annonce['advertise']['advertise']['d_adresse'] ?>, <?php echo $annonce['advertise']['advertise']['d_CP'] ?> <?php echo $annonce['advertise']['advertise']['d_city'] ?>
        </p>
        <div class="row">
            <p class="description-advertise"><?php echo $annonce['advertise']['advertise']['d_description'] ?></p>
            <ul class="row column_center precision-advertise">
                <li class="margin-r-10 margin-l-20 column">
                    <i class="fa fa-expand center-img" aria-hidden="true"></i><?php echo $annonce['advertise']['advertise']['d_size'] ?>m²
                </li>
                <li class="column">
                    <i class="fa fa-bed center-img" aria-hidden="true"></i><?php echo $annonce['advertise']['house']['h_type'] ?>
                </li>
            </ul>
        </div>
        <ul>
            <li>
                Adresse :
            </li>
            <li>
                Loyer : <?php echo $annonce['advertise']['advertise']['d_price_rent'] ?>€ dont <?php echo $annonce['advertise']['advertise']['d_price_taxe'] ?>€ de charges
            </li>
            <li>
                Type de chauffage : <?php echo $annonce['advertise']['advertise']['d_type_heating'] ?>
            </li>
        </ul>
    </div>
</section>
<script src="js/common.js" crossorigin="anonymous"></script>
<script src="Bootstrap/js/bootstrap.bundle.js"></script>
<script src="Bootstrap/js/bootstrap.bundle.js.map"></script>
<script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Bootstrap/js/bootstrap.bundle.min.js.map"></script>
<script src="Bootstrap/js/bootstrap.js"></script>
<script src="Bootstrap/js/bootstrap.js.map"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js.map"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>