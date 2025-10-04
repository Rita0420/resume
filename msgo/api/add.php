<?php
include_once "db.php";
$game=$_POST['game'];

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

$Card->save($_POST);

to("../backend.php?game=$game&do=card");