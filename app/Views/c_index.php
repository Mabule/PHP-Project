<?php
include 'php/header.php';
include 'php/index.php';
if(isset($_SESSION['email'])){
    $_SESSION['user'] = $_SESSION['email'];
}
unset($_SESSION['login']);
unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['login']);
unset($_SESSION['email']);
unset($_SESSION['mdp']);