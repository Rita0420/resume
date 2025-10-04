
<?php
                $rows=$Card->all();
                foreach($rows as $row):?>
<div class="col-3 mt-5">
    <form id="myForm" action="./api/card.php" method="post" enctype="multipart/form-data">
        <div style="display: flex;justify-content: space-between;">
            <label for="img<?=$row['id'];?>" class="btn btn-primary mb-2">更換圖片</label>
            <input type="file" name="img" id="img<?=$row['id'];?>" accept="image/*" hidden>
            <!-- <button class="btn btn-info chang" type="submit" id="changPic">確定</button> -->
            <button type="button" class="btn btn-delete mb-2" style="color:brown;" onclick="del()"><i
                    class="fa-solid fa-trash-can"></i>刪除</button>
        </div>
        <div class="card ">
            <img class="card-img-top" src="./images/<?=$row['img'];?>" alt="Card image" style="width:100%">
            <div class="card-body">


                <h4 class="card-title text-center"><?=$row['name'];?></h4>
                <div class="card-text mb-3">

                    <div>
                        <input type="text" value="<?=$row['title'];?>" class="input" name="title">
                    </div>
                    <div class="mt-2"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;遊戲人數：
                        <input type="text" value="<?=$row['people'];?>" name="people">人
                    </div>
                    <div class="mt-2"><i class="fa-solid fa-coins"></i>&nbsp;&nbsp;&nbsp;金額：
                        <input type="text" value="<?=$row['price'];?>" name="price">
                    </div>
                    <div class="mt-2"><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;&nbsp;遊戲時間
                        <input type="number" value="<?=$row['time'];?>" name="time">min
                    </div>
                    <input type="hidden" name="id" value="<?=$row['id'];?>">
                </div>
                <div class="text-center">
                    <input type="hidden" name="game" value="<?=$row['game'];?>" id="game<?=$row['id'];?>">
                    <input type="submit" class="btn btn-primary mb-2" value="確定修改">
                    <?php
                if($row['sh']==1):
                ?>
                    <input type="button" class="btn btn-primary sh mb-2" data-sh="0" data-id="<?=$row['id'];?>"
                        value="下架">
                    <?php else:?>
                    <input type="button" class="btn btn-primary sh mb-2" data-sh="1" data-id="<?=$row['id'];?>"
                        value="上架">
                    <?php endif;?>
                </div>
            </div>
        </div>
    </form>
</div>
<?php endforeach;?>

<script>
$('.sh').on("click", function() {
    let sh = $(this).data('sh');
    let id = $(this).data('id');
    console.log(sh);
    console.log('ok');

    $.post("./api/edit_sh.php", {
        sh,
        id
    }, (res) => {

        if (res) {
            location.reload();
        }

    })
})
<?php
$rows=$Card->all();
foreach($rows as $row):
?>
$('#img<?=$row['id'];?>').on('change', function(e) {
    const file = e.target.files[0];
    const $preview = $(this).parent().parent().find(".card-img-top");
    // const $preview = $('.card-img-top');
    console.log($preview);

    change(file, $preview);
});
<?php endforeach;?>

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

<?php
$rows=$Card->all();
foreach($rows as $row):
?>
function del() {
    const game = $("#game<?=$row['id'];?>").val();
    console.log(game);
    if (confirm("確定要刪除嗎?")) {
        $.get("./api/del.php", {
            game
        }, (res) => {
            console.log(res);
            location.reload();

        })
    }


}

<?php endforeach;?>
</script>