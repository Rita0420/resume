<?php include_once "./api/db.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSGO迷書狗工作室</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.bundle.min.js"
        integrity="sha512-Tc0i+vRogmX4NN7tuLbQfBxa8JkfUSAxSFVzmU31nVdHyiHElPPy2cWfFacmCJKw0VqovrzKhdd2TSTMdAxp2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
        integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/new.css">
</head>

<body>
    <!-- nav -->
    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img class="logoImg" src="./icon/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <?php
                    $games=$Card->all();
                    foreach($games as $game):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?game=<?=$game['game'];?>&do=more"><?=$game['name'];?></a>
                    </li>
                    <?php endforeach;?>
                    <li class="nav-item">
                        <a class="nav-link" href="?do=add&game=bean">新增遊戲</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./api/logout.php">登出</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav end-->

    <div class="container mt-5">
        <div class="row">
            <!-- 選擇功能區 -->
            <!-- <div class="col-2 menu text-center">
                <div class=" ">
                    <div>
                        <button class="btn btn-info mt-3" type="button"
                            onclick="location.replace('?do=card')">廣告區</button>
                    </div>
                    <div>
                         <button class="btn btn-info mt-3" type="button"
                            <?php //$moreDo=$More->find(['game'=>$_GET['game']]);?>
                            onclick="location.replace('?game=<?//=(!isset($_GET['game'])) || ($_GET['game']=='news')?'bean':$_GET['game']?>&do=<?//=($moreDo === false)?'add_more':'more';?>')">內容區</button>
                    </div>
                    <div>
                        <button class="btn btn-info mt-3" type="button"
                            onclick="location.replace('?game=news&do=news')">最新消息區</button>
                    </div>
                </div>
            </div> -->
            <div class="col-2 menu text-center">
                <div class=" ">
                    <div>
                        <button class="btn btn-info mt-3" type="button"
                            onclick="location.replace('?game=<?=(!isset($_GET['game'])) || ($_GET['game']=='news')?'bean':$_GET['game'];?>&do=<?=(isset($_GET['do']))?'card':'add';?>')">廣告區</button>
                    </div>
                    <div>
                        <button class="btn btn-info mt-3" type="button"
                            <?php $moreDo=$More->find(['game'=>$_GET['game']]);?>
                            onclick="location.replace('?game=<?=(!isset($_GET['game'])) || ($_GET['game']=='news')?'bean':$_GET['game']?>&do=<?=($moreDo === false)?'add_more':'more';?>')">內容區</button>
                    </div>
                    <div>
                        <button class="btn btn-info mt-3" type="button"
                            onclick="location.replace('?game=news&do=news')">最新消息區</button>
                    </div>
                </div>
            </div>
            <!-- 選擇功能區 end-->
            <div class="col-3 mt-5"></div>
            
            <!-- <div class="col-2 smallCard"></div> -->
            <?php $do=$_GET['do']??"card"; ?>
            <!-- <div class="col-9 col-sm-<?=($do == 'news')?5:4;?> mt-5"> -->
                <!-- <div class="main"> -->
                    <?php
                    $file="./backend/$do.php";
                    if(isset($file)){
                        include_once $file;
                    }else{
                        include_once "./backend.php?do=card&game=bean";
                    }
                    
                    ?>
                <!-- </div> -->

            <!-- </div> -->
            <?php if($_GET['do']=='more'):?>
            <div class="col-9 col-sm-4 carouselMore mt-5">
                <?php include_once "./backend/carousel.php";?>
            </div>
            <?php endif;?>
        </div>
    </div>






</body>

</html>