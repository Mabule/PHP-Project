<?php
if(isset($_POST['login'])){
    include 'html/sign_in.php';
}else{
    include 'html/header.php';
    include 'html/personnal_space.php';
}
