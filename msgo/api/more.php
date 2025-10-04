<?php
include_once "db.php";
$game=$_POST['game'];



if(!empty($_FILES['gameContent']['tmp_name'])){
    move_uploaded_file($_FILES['gameContent']['tmp_name'],'../images/'.$_FILES['gameContent']['name']);
    $_POST['gameContent']=$_FILES['gameContent']['name'];
}
if(!empty($_FILES['gamePrice']['tmp_name'])){
    move_uploaded_file($_FILES['gamePrice']['tmp_name'],'../images/'.$_FILES['gamePrice']['name']);
    $_POST['gamePrice']=$_FILES['gamePrice']['name'];
}


    $More->save($_POST);

to("../backend.php?game=$game&do=more");
