<?php
    $sql = "SELECT * FROM tbl_news WHERE id_news='".$_GET['id']."' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
?>
<h3>Thông tin bài viết</h3>
<table>
    <form action="modules/news/progress.php" method="post" enctype="multipart/form-data">
        <tr>
            <td colspan='2'><input type="hidden" name="id" value="<?=$row['id_news'];?>"></td>
        </tr>
        <tr>
            <td>Tên tin tức</td>
            <td><input type="text" name="newsName" value="<?=$row['news_name'];?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <img src="modules/news/uploads/<?=$row['image'];?>" style="width:100px; height:100px;">
                <input type="file" name="image" >
            </td>
        </tr>
        <tr>
            <td>Tóm tắt nội dung</td>
            <td>
                <textarea name="summary" cols="30" rows="10"><?=$row['summary'];?></textarea>
            </td>
        </tr>
        <tr>
            <td>Nội dung tin tức</td>
            <td>
                <textarea name="content" cols="30" rows="10"><?=$row['content'];?></textarea>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="newsStatus" >
                    <?php
                        if($row['status'] == 1){
                    ?>
                    <option selected value="1">Posted</option>
                    <option value="0">Hidden</option>
                    <?php     
                        } else{
                    ?>
                    <option value="1">Posted</option>
                    <option selected value="0">Hidden</option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="Lưu" name="update_news" class="add_category"></td>
        </tr>
    </form>
</table>