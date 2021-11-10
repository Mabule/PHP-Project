<?php
//include 'php/sign_in.php';
helper('html');
helper('form');
echo doctype();
echo "<html>";
echo "<head>";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
echo "<meta name=\"author\" content=\"PASCHÉHTOI\">";
$t = [
    'href' => "common.css",
    'indexPage' => false
];
echo basename (__FILE__, '.php');
$scandir = scandir("css");
foreach($scandir as $fichier){
    echo "$fichier<br/>";
}
echo link_tag($t);
$t = [
    'href' => "css/form.css",
    'indexPage' => true
];
echo link_tag($t);
$t = [
    'href' => "css/sign_in.css",
    'indexPage' => true
];
echo link_tag($t);
echo "<title>Coucou</title>";
echo "</head>";
echo "<body class=\"column column_center\">";
echo "<h1>Inscription</h1>";
$attr = ['class' => 'column'];
echo form_open("Form", $attr);
$data = [
    'placeholder' => "Nom",
    'name' => "nom"
];
echo form_label("Nom :<br>".form_input($data), $data['name']);
$data = [
    'placeholder' => "Prénom",
    'name' => "prenom"
];
echo form_label("Prénom :<br>".form_input($data), $data['name']);
$data = [
    'placeholder' => "Pseudo",
    'name' => "login"
];
echo form_label("Pseudo :<br>".form_input($data), $data['name']);
echo form_label("Email :<br><input type=\"email\" placeholder=\"addresse.email@gmail.com\" required name=\"email\">", "email");
$data = [
    'name' => "mdp"
];
echo form_label("Mot de passe :<br>".form_password($data), $data['name']);
$data = [
    'name' => "mdp_confirm"
];
echo form_label("Confirmation du mot de passe :<br>".form_password($data), $data['name']);
echo "<div class=\"row\">";
echo form_submit("send", "S'inscrire");
echo "<a href=\"C_sign_up\" class=\"bottom_handler\">Se connecter</a>";
echo "</div>";
echo form_close();
echo script_tag(['src' => "https://kit.fontawesome.com/7f62026b48.js", 'crossorigin' => "anonymous"]);
echo script_tag("js/app.js");
echo "</body>";
echo "</html>";