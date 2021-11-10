<?php
session_start();
if(!isset($_POST['login'])){
    return view('c_sign_in');
}else{
    include 'php/header.php';
    include 'php/index.php';
}
