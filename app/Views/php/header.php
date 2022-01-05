<link rel="stylesheet" type="text/css" href="css/common.css">
<?php
$html = "<header class=\"row\">
            <img src=\"img/TestLogo.png\">  
            <nav class=\"row column_center\">
                <ul class=\"row column_center\" id=\"blanc\">
                    <li>
                        <a href=\"".base_url()."/Home\">Accueil</a>
                    </li>
                    <li>
                        <a href=\"".base_url()."/C_advertise\">Toutes les annonces</a>
                    </li>
                    <li>
                        <a href=\"";
if(!isset($_SESSION["id"])){
    $html .= base_url() ."/C_sign_in\">Se connecter</a>
            </li>";
}else{
    $html .= base_url() ."/C_personnal_space\">Mon espace</a>
            </li>
            <li>
                <a href=\"".base_url()."/C_disconnect\">Se déconnecter</a>
            </li>";
}
$html .= "</nav>
</header>";
echo $html;
?>
