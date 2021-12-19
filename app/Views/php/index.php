<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Mabule">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>Coucou</title>
</head>

<body>
	<section class="presentation">
        <form method="post" enctype="multipart/form-data" action="Upload">
            <input type="file" name="userfile" accept=".jpg, .jpeg, .png">
            <input type="submit" value="Envoyer">
        </form>
		<div class="pannel">
            <?php
            $nb_row = 0;
            if($_SESSION['annonce'] != 0){
                $nb_row = count($_SESSION['annonce']);
            }
            (new \App\Controllers\Create_Row($nb_row))->getHTML();
            ?>
		</div>
	</section>
	<script src="https://kit.fontawesome.com/7f62026b48.js" crossorigin="anonymous"></script>
	<script src="js/index.js"></script>
</body>
</html>