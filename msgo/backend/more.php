<?php
$row=$More->find(['game'=>$_GET['game']]);
?>
<div style="text-align: center;" class="col-4 mt-5">
<form action="./api/more.php" method="post" enctype="multipart/form-data">
    <h6 class="text-center">遊戲內容介紹</h6>
    <div class="boxMore">
        <div class="morePic">
            <img id="preview" src="./images/<?=$row['gameContent'];?>" alt="" style="width: 100%;">
        </div>
        <div class="mt-3">
            <label for="gameContent" class="btn btn-primary">更換遊戲介紹圖</label>
            <input type="file" name="gameContent" id="gameContent" value="<?=$row['gameContent'];?>" hidden>
        </div>
    </div>
    <h6 class="text-center">遊戲價格</h6>
    <div class="boxMore">
        <div>
            <img src="./images/<?=$row['gamePrice'];?>" alt="" style="width: 100%;" id="priceImg">
        </div>
        <div class="mt-3">
            <label for="gamePrice" class="btn btn-primary">更換遊戲價格圖</label>
            <input type="file" name="gamePrice" id="gamePrice" value="<?=$row['gamePrice'];?>" hidden>
        </div>
    </div>
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="hidden" name="game" value="<?=$_GET['game'];?>">
    <div class="mt-5">
        <input type="submit" class="btn btn-primary" value="更新">
    </div>
</form>
</div>




<script>
$('#gameContent').on('change', function(e) {
    const file = e.target.files[0];
    const $preview = $('#preview');
    change(file, $preview);
});
$('#gamePrice').on('change', function(e) {
    const file = e.target.files[0];
    const $preview = $('#priceImg');
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