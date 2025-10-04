<h3 style='text-align:center'>新增會員帳號</h3>
<hr>
<form action="./api/insert.php" method='post' enctype="multipart/form-data" >
    <div>
        <label for="">帳號:</label>
        <input type="text" name="acc">
    </div>
    <div>
        <label for="">密碼:</label>
        <input type="password" name="pw">
    </div>
    <div>
        <label for="">確認密碼:</label>
        <input type="password" name="">
    </div>
    <div>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
