<?php
    $sql = "SELECT * FROM tbl_category ORDER BY id_category ASC";
    $sql_query = mysqli_query($conn, $sql);
?>
<h3>Danh mục</h3>
<table>
    <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Quản lí</th>
    </tr>

    <?php
        $i=0;
        while($row = mysqli_fetch_array($sql_query)){
            $i++;
    ?>
    <tr>
        <td><?=$i;?></td>
        <td><?=$row['cate_name'];?></td>
        <td>
            <a href="modules/category/progress.php?iddanhmuc=<?=$row['id_category'];?>">Xóa</a> |
            <a href="index.php?action=quanlidanhmuc&&mange=modify&&iddanhmuc=<?=$row['id_category'];?>">Sửa</a>
        </td>
    </tr>

    <?php
        }
    ?>
</table>