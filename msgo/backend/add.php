
<div class="col-6">
<h3 style="text-align: center;">新增遊戲</h3>

<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-img-top mt-2" style="text-align: center;">
            <label for="img" class="btn btn-primary">新增圖片</label>
            <img src="" alt="" id="newPic" style="width: 20vw;">
            <input type="file" name="img" id="img" hidden>
        </div>
        <div class="card-body">
            <h4 class="card-title text-center">
                <input type="text" name="name" placeholder="中文遊戲名稱">
            </h4>

            <div class="card-text mb-3">
                <div>
                    <input type="text" name="game" placeholder="英文遊戲名稱">
                </div>
                <div>
                    <input type="text" value="" class="input" name="title" placeholder="遊戲介紹">
                </div>
                <div class="mt-2"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;遊戲人數：
                    <input type="text" value="" name="people">人
                </div>
                <div class="mt-2"><i class="fa-solid fa-coins"></i>&nbsp;&nbsp;&nbsp;金額：
                    <input type="text" value="" name="price">
                </div>
                <div class="mt-2"><i class="fa-solid fa-clock"></i>&nbsp;&nbsp;&nbsp;遊戲時間
                    <input type="number" value="" name="time">min
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="確定新增">
            </div>
        </div>
    </div>
</form>
</div>

<script>
$('#img').on('change', function(e) {
    const file = e.target.files[0];
    const $newPic = $('#newPic');
    change(file, $newPic);
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