<h3>Thêm tin tức</h3>
<table>
    <form action="modules/news/progress.php" method="post" enctype="multipart/form-data">
        <tr>
            <td>Tên tin tức</td>
            <td><input type="text" name="newsName" ></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="image" ></td>
        </tr>
        <tr>
            <td>Tóm tắt nội dung</td>
            <td>
                <textarea name="summary" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>Nội dung tin tức</td>
            <td>
                <textarea name="content" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="newsStatus" >
                    <option value="1">Post</option>
                    <option value="0">Hidden</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="Thêm" name="save" class="add_category"></td>
        </tr>
    </form>
</table>
<hr>