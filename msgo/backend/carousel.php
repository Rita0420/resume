<div class="col-6">
<form action="./api/carousel.php" method="post">
    <h6 class="text-center">遊戲輪播圖</h6>
    <?php
$imgs=$Carousel->all(['game'=>$_GET['game']]);
foreach($imgs as $img):
?>
    <div class="boxC mt-2">
        <div class="imgC">
            <img src="./images/<?=$img['img'];?>" alt="" style="width:100%;">
        </div>
        <div class="gameC">
            <div>
                <input type="checkbox" name="sh[]" id="" value="<?=$img['id'];?>" <?=($img['sh']== 1)?'checked':'';?>>
                <label for="sh[]">顯示</label>
            </div>
            <div>
                <input type="checkbox" name="del[]" id="" value="<?=$img['id'];?>">
                <label for="del[]">刪除</label>
            </div>
            <input type="hidden" name="id[]" value="<?=$img['id'];?>">
            <input type="hidden" name="game" value="<?=$img['game'];?>">
        </div>
    </div>
    <?php endforeach;?>
    <div class="mt-3" style="text-align: center;">
    <input type="submit" class="btn btn-primary" value="修改">
    </div>
</form>
<button type="button" class="btn btn-primary newC" data-bs-toggle="modal" data-bs-target="#myModal">
    新增遊戲輪播圖
</button>
</div>
<form action="./api/carousel.php" method="post" enctype="multipart/form-data">
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">新增遊戲輪播圖</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="text-align: center;">
                    <img src="" alt="" id="newImg" style="width: 100%;">
                    <label for="newPic" class="btn btn-primary mt-5">新增輪播圖片</label>
                    <input type="file" name="newPic" id="newPic" hidden>
                    <input type="hidden" name="game" value="<?=$_GET['game'];?>">
                    <input type="hidden" name="do" value="more">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">新增</button>
                </div>
</form>
</div>
</div>
</div>

<script>
$('#newPic').on('change', function(e) {
    const file = e.target.files[0];
    const $preview = $('#newImg');
    change(file, $preview);
});

function change(file, $preview) {

    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            $preview.attr('src', event.target.result).show();
        };
        reader.readAsDataURL(file);
    } else {
        $preview.hide();
    }


}
</script>