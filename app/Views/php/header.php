<link rel="stylesheet" type="text/css" href="/css/common.css">
<?php
$html = "<header class=\"row\">
            <img src=\"/img/Testlogo.png\">
            <nav class=\"row column_center\">
                <ul class=\"row column_center\" id=\"blanc\">
                    <li>
                        <a href=\"/Home\">Accueil</a>
                    </li>
                    <li>
                        <a href=\"/C_advertise\">Toutes les annonces</a>
                    </li>
                    <li>
                        <a href=\"";
if(!isset($_SESSION["id"])){
    $html .= "/C_sign_in\">Se connecter</a>
            </li>";
}else{
    $html .= "/C_personnal_space\">Mon espace</a>
            </li>
            <li>
                <a href=\"/C_sign_in\">Se déconnecter</a>
            </li>";
}
$html .= "</nav>
</header>";
echo $html;
?>
