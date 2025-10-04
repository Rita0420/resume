<?php
include_once "db.php";

$user=$User->count($_POST);

if($user){
    if($_POST['acc'] == 'admin'){
        $_SESSION['admin']=1;
        to("../backend.php?do=card&game=bean");
    }else{
        to("../index.php");
    }
}