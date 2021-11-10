<?php
if(isset($_POST['login'])){
    return view('c_sign_in');
}else{
    include 'php/header.php';
    include 'php/advertise.php';
}
