<?php
session_start();
if(isset($_POST['login'])){
    include 'html/sign_in.php';
}else{
    include 'html/header.php';
    include 'html/index.php';
}
