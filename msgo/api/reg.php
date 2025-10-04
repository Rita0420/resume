<?php
include_once "db.php";
// $res=$User->save([
//     'acc'=>$_POST['acc'],
//     'pw'=>$_POST['pw'],
//     'email'=>$_POST['email'],
//     'name'=>$_POST['name'],
//     'birthday'=>$_POST['birthday'],
// ]);

$res=$User->save($_POST);
if($res){
    echo 1;
}else{
    echo 0;
}