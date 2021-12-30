<link rel="stylesheet" type="text/css" href="css/common.css">
<?php
$html = "<header class=\"row flex_center\">
            <img src=\"img/Testlogo.png\">
            <nav class=\"row column_center\">
                <ul class=\"row column_center\">
                    <li>
                        <a href=\"Home\">Accueil</a>
                    </li>
                    <li>
                        <a href=\"C_advertise\">Toutes les annonces</a>
                    </li>
                    <li>
                        <a href=\"\"";
if(!isset($_SESSION['connect'])){
    $html .= "C_sign_up\">Se connecter</a>
            </li>";
}else{
    $html .= "C_personnal_space\">Mon espace</a>
            </li>
            <li>
                <a href=\"C_disconnect\">Se déconnecter</a>
            </li>";
}
$html .= "</nav>
</header>";
echo $html;
?>
