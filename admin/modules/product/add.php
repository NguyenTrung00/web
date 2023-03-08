<h3>Thêm sản phẩm</h3>
<form action="modules/product/progress.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="product_name" ></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="product_code"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="product_price"></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="text" name="quantity"></td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td>
                <textarea name="content"  cols="30" rows="5" style="resize:none;"></textarea>
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td>
                <textarea name="summary" cols="30" rows="5" style="resize:none"></textarea>
            </td>
        </tr>
        <tr>
            <td>Danh mục</td>
            <td>
                <select name="category">
                    <?php
                        $sql = "SELECT * FROM tbl_category ";
                        $sql_query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($sql_query)){

                    ?>
                    <option value="<?=$row['id_category'];?>"><?=$row['cate_name'];?></option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình trạng</td>
            <td>
                <select name="status" >
                    <option value="1" selected >Kich hoat</option>
                    <option value="0">An</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="Thêm" name="add_product" class="add_category"></td>
        </tr>
    </table>
</form>
<hr>