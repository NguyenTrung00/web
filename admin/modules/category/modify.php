<?php
    $sql = "SELECT * FROM tbl_category WHERE id_category ='".$_GET['iddanhmuc']."' LIMIT 1";
    $sql_query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($sql_query)){
?>
<h3>Thông tin danh mục</h3>
<form action="modules/category/progress.php?iddanhmuc=<?=$row['id_category'];?>" method="post">
    <table>
        <tr>
            <td>Tên danh mục</td>
            <td>
                <input type="text" name="cate_name" value="<?=$row['cate_name'];?>">
            </td>
        </tr>
        <tr>
            <td>thứ tự</td>
            <td>
                <input type="text" name="ordered" value="<?=$row['ordered'];?>">
            </td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan='2'><input type="submit" value="Lưu" name="update_category" class="add_category"></td>
        </tr>
    </table>
</form>