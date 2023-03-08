<?php
    $sql = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.id_category = tbl_category.id_category ORDER BY tbl_product.id_product DESC";
    $sql_query = mysqli_query($conn, $sql);
    $i = 0;
?>
<h3>Thông tin sản phẩm</h3>
<table style="width:90%">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Mã sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Danh mục</th>
        <th>Tóm tắt</th>
        <th>Tình trạng</th>
        <th>Quản lí</th>
    </tr>
    <?php
        while($row = mysqli_fetch_array($sql_query)){
            $i++;
    ?>
    <tr>
        <td><?=$i;?></td> 
        <td><?=$row['pro_name'];?></td>
        <td>
            <img src="modules/product/uploads/<?=$row['picture'];?>" style="width:100px;height:100px">
        </td>
        <td><?=$row['pro_code'];?></td>
        <td><?=$row['pro_price'];?></td>
        <td><?=$row['cate_name'];?></td>
        <td><?=$row['summary'];?></td>
        <td>
            <?php
                if($row['pro_stt'] == 1){
                    echo "Kích hoạt";
                } elseif($row['pro_stt'] == 0){
                    echo "Ẩn";
                }
            ?>
        </td>
        <td>
            <a href="modules/product/progress.php?idsanpham=<?=$row['id_product'];?>">Xóa</a> | 
            <a href="index.php?action=quanlisanpham&&mange=modify&&idsanpham=<?=$row['id_product'];?>">Sửa</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>