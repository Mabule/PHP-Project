<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mabule">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/annonce.css">
    <title><?php echo $_SESSION['advertise']['title'] ?></title>
</head>
<body>
<section class="presentation">
    <div class="pannel">
        <h3><?php echo $_SESSION['advertise']['title'] ?></h3>
        <h5><?php echo $_SESSION['advertise']['adresse'] ?></h5>
        <img src="<?php echo $_SESSION['advertise']['image'] ?>" alt="Une maison">
        <h5><?php echo $_SESSION['advertise']['description'] ?></h5>
        <ul>
            <li>
                1 : <?php  ?>
            </li>
            <li>
                2 : <?php  ?>
            </li>
            <li>
                3 : <?php  ?>
            </li>
        </ul>
    </div>
</section>
<script src="https://kit.fontawesome.com/7f62026b48.js" crossorigin="anonymous"></script>
<script src="js/app.js"></script>
</body>
</html>