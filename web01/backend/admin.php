<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">使用者帳號管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="40%">帳號</td>
                    <td width="40%">密碼</td>
                    <td width="7%">刪除</td>
                </tr>
                <?php
					$rows=${ucfirst($do)}->all('ad');
					foreach($rows as $row):
								?>

                <tr>
                    <td width="40%">
						<input type="text" name="acc[]" value="<?=$row['acc'];?>" style="width:90%">
					</td>
                    <td width="40%">
						<input type="password" name="pw[]" value="<?=$row['pw'];?>" style="width:90%">
					</td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" id="" value="<?=$row['id'];?>">
                    </td>
                </tr>
				<input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php
					endforeach;
								?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>">                    
                    <td width="200px"><input type="button"
                            onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增會員帳號">
                    </td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>