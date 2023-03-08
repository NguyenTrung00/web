<?php
    $sql ="SELECT * FROM tbl_product WHERE id_product='".$_GET['idsanpham']."' LIMIT 1";
    $sql_query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($sql_query)){

?>
<h3>Thông tin sản phẩm</h3>
<form action="modules/product/progress.php?idsanpham=<?=$row['id_product'];?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="product_name" value="<?=$row['pro_name'];?>"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="product_code" value="<?=$row['pro_code'];?>"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="product_price" value="<?=$row['pro_price'];?>"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="quantity" value="<?=$row['quantity'];?>"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="image">
                <img src="modules/product/uploads/<?=$row['picture'];?>">
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td>
                <textarea name="content"  cols="30" rows="5" style="resize:none;"><?=$row['content'];?></textarea>
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td>
                <textarea name="summary" cols="30" rows="5" style="resize:none"><?=$row['summary'];?></textarea>
            </td>
        </tr>
        <tr>
            <td>Danh mục</td>
            <td>
                <select name="category" >
                    <?php
                        $sql_category = "SELECT * FROM tbl_category";
                        $query_category = mysqli_query($conn, $sql_category);
                        while($row_category = mysqli_fetch_array($query_category)){
                            if($row_category['id_category'] == $row['id_category']){                    
                    ?>
                    <option selected value="<?=$row_category['id_category'];?>"><?=$row_category['cate_name'];?></option>
                    <?php
                            }else {
                    ?>
                    <option value="<?=$row_category['id_category'];?>"><?=$row_category['cate_name'];?></option>
                    <?php  
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="status" >
                    <?php
                        if($row['pro_stt'] == 1){
                    ?>
                    <option value="1" selected>Kích hoạt</option>
                    <option value="0">Ẩn</option>
                    <?php
                        } else{
                    ?>
                    <option value="1">Kích hoạt</option>
                    <option value="0" selected>Ẩn</option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="Lưu" name="update_product" class="add_category"></td>
        </tr>
        <?php
        }
        ?>
    </table>
</form>