<?php
include_once "db.php";

if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}else{
    unset($_SESSION['login']);
}

to("../index.php");