<?php
include_once "db.php";

$table=$_POST['game'];
$do=$_POST['do'];

unset($_POST['do']);
if(!empty($_FILES['newPic']['tmp_name'])){
    move_uploaded_file($_FILES['newPic']['tmp_name'],'../images/'.$_FILES['newPic']['name']);
    $_POST['img']=$_FILES['newPic']['name'];
    $Carousel->save($_POST);
}

if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Carousel->del($id);
        }else{
            $img=$Carousel->find($id);
            $img['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $Carousel->save($img);
        }
    }
}

to("../backend.php?game=$table&do=$do");