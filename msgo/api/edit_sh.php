<?php
include_once "db.php";
// echo "2".$_POST['sh'];
$sh=$_POST['sh'];
$id=$_POST['id'];

$find=$Card->find($id);

$find['sh']=$sh;
echo $Card->save($find);