<?php
include_once "db.php";

$chk=$User->count(['acc'=>$_POST['acc']]);

if($chk){
    echo 1;
}else{
    echo 0;
}
