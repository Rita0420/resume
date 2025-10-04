<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="./api/edit_column.php">
        <table width="50%" style="margin:auto">
            <tbody>
                <tr class="yel">
                    <td width="50%">進站總人數</td>
                    <td width="50%">
                        <input type="text" name="<?=$do;?>" value="<?=${ucfirst($do)}->find(1)[$do];?>" style="width:90%">
                    </td>
                </tr>
				<input type="hidden" name="id" value="<?=${ucfirst($do)}->find(1)['id'];?>">
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"></td>
                    <input type="hidden" name="table" value="<?=$do;?>">                    
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>