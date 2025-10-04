<?php
include_once "db.php";
$chk=($Card->del(['game'=>$_GET['game']])) && ($Carousel->del(['game'=>$_GET['game']])) && ($More->del(['game'=>$_GET['game']]));
echo $chk;