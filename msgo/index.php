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
            <a class="navbar-brand" href="#">
                <img class="logoImg" src="./icon/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <?php
                    $games=$Card->all(['sh'=>1]);
                    foreach($games as $game):
                    ?>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal<?=$game['id'];?>"><?=$game['name'];?></button>
                    </li>
                    <?php endforeach;?>
                    <li class="nav-item">
                        <?php
                        if(isset($_SESSION['admin'])):
                        ?>
                        <a class="nav-link" href="./backend.php?do=card&game=bean">管理後台</a>
                        <?php else:?>
                        <a class="nav-link" href="./front/login.php">登入</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./front/reg.php">註冊</a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav end-->

    <!-- 介紹密室逃脫的輪播圖片 -->
    <div class="container newsContainer">
        <div class="row">
            <div class="col-12">
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        <?php
                        $news = $Carousel->all(['sh'=>1,'game'=>'news']);
                        foreach($news as $index => $new):
                        ?>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="<?=$index;?>"
                            class="<?=($index==0)?'active':'';?>"></button>
                        <?php endforeach; ?>
                    </div>

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <?php foreach($news as $index => $new): ?>
                        <div class="carousel-item <?=($index==0)?'active':'';?>">
                            <img src="./images/<?=$new['img'];?>" alt="Slide <?=$index+1;?>" class="d-block"
                                style="width:100%">
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>

            </div>
        </div>
    </div>

    <!-- 介紹密室逃脫的輪播圖片 end-->

    <!-- 遊戲區 -->
    <div class="container content">
        <div class="row">
            <?php $cards=$Card->all(['sh'=>1]);
                    foreach($cards as $card):?>
            <div class="col-12 col-sm-4">
                <div class="cardBox mt-5">
                    <div class="card">
                        <img class="card-img-top" src="./images/<?=$card['img'];?>" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title text-center"><?=$card['name'];?></h4>
                            <div class="card-text mb-3">
                                <div><?=$card['title'];?></div>
                                <div><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;遊戲人數：<?=$card['people'];?></div>
                                <div><i class="fa-solid fa-coins"></i>&nbsp;&nbsp;&nbsp;金額：<?=$card['price'];?></div>
                                <div><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;&nbsp;遊戲時間<?=$card['time'];?>min</div>
                            </div>
                            <div style="display: flex;justify-content: space-around;">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#myModal<?=$card['id'];?>">更多內容</button>
                                <!-- <a href="#" class="btn btn-primary">預約</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php $cards=$Card->all(['sh'=>1]);
    foreach($cards as $card):?>
    <div class="modal modal-xl" id="myModal<?=$card['id'];?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?=$card['name'];?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body moreBody">
                    <div>
                        <div class="moreContainer">
                            <div id="demo<?=$card['id'];?>" class="carousel slide" data-bs-ride="carousel"
                                style="width: fit-content;">

                                <!-- Indicators/dots -->
                                <div class="carousel-indicators">
                                    <?php
                                            $carousels = $Carousel->all(['sh'=>1,'game'=>$card['game']]);
                                            foreach($carousels as $index => $carousel):
                                            ?>
                                    <button type="button" data-bs-target="#demo<?=$card['id'];?>"
                                        data-bs-slide-to="<?=$index;?>" class="<?=($index==0)?'active':'';?>"></button>
                                    <?php endforeach; ?>
                                </div>

                                <!-- The slideshow/carousel -->
                                <div class="carousel-inner">
                                    <?php foreach($carousels as $index => $carousel): ?>
                                    <div class="carousel-item <?=($index==0)?'active':'';?>" style="width: 100%;">
                                        <img src="./images/<?=$carousel['img'];?>" alt="Slide <?=$index+1;?>"
                                            class="d-block" style="width:100%">
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Left and right controls/icons -->
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#demo<?=$card['id'];?>" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#demo<?=$card['id'];?>" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>

                            </div>
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <?php
                        $more=$More->find(['game'=>$card['game']]);
                        ?>
                        <div>
                            <img src="./images/<?=$more['gameContent'];?>" alt="" style="width:100%">
                        </div>
                        <div class="mt-2">
                            <img src="./images/<?=$more['gamePrice'];?>" alt="" style="width:100%">
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-primary " data-bs-dismiss="modal">預約</button> -->
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <!-- 遊戲區 end-->

    <!-- 好評推薦Google -->

    <!-- 好評推薦Google end-->
    
    <!-- 部落客推薦 -->
     
    <!-- 部落客推薦 end-->
    
    <!-- footer 關於我們 地圖 -->
    <div class="container" style="text-align: center;">
        <div class="row" style="display: flex;justify-content:space-around">
            <div class="col-12 col-sm-5">
                <h6>謎書狗工作室壹館</h6>
                <div style="height:30vh;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.5774777773704!2d121.54194717543069!3d25.048409177807038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442ab41c3cffa37%3A0x7368e4962a72ddd3!2zTVNHTyDorI7mm7jni5flt6XkvZzlrqQgLSDlr4blrqTpgIPohKsg5a-G5a6kR08!5e0!3m2!1szh-TW!2stw!4v1753962575000!5m2!1szh-TW!2stw"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <h6>謎書狗工作室惡館</h6>
                <div style="height:30vh;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.2574410229895!2d121.56640407542993!3d25.025335977821968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442ab3b289679ab%3A0x773481f9410f6195!2zTVNHTyDorI7mm7jni5flt6XkvZzlrqQgLSDkuozppKgg54mb6aCt5p2R!5e0!3m2!1szh-TW!2stw!4v1753962610927!5m2!1szh-TW!2stw"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- footer 關於我們 地圖 end-->
</body>

</html>