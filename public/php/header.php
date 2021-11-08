<link rel="stylesheet" type="text/css" href="css/common.css">
<?php
$html = "<header class=\"row flex_center\">
            <img src=\"img/logo.png\">
            <nav class=\"row column_center\">
                <ul class=\"row\">
                    <li>
                        <a href=\"Home\">Accueil</a>
                    </li>
                    <li>
                        <a href=\"C_advertise\">Toutes les annonces</a>
                    </li>
                    <li>
                        <a href=\"";
if(isset($_SESSION['login'])){
    $html .= "C_sign_in\">Se connecter";
}else{
    $html .= "C_personnal_space\">Mon espace";
}
$html .= "      </a>
            </li>   
        </ul>
    </nav>
</header>";
echo $html;
?>
