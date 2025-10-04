<?php

include_once "db.php";

$table=$_POST['table'];
$DB=${ucfirst($table)};

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$_FILES['img']['name']);
    $row=$DB->find($_POST['id']);
    $row['img']=$_FILES['img']['name'];
    $DB->save($row);
}

to("../backend.php?do=$table");