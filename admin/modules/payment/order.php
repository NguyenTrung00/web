<?php
    if(isset($_GET['codecart'])){
        $codecart = $_GET['codecart'];
    }
    $sql = "SELECT * FROM tbl_product, tbl_cart_details WHERE tbl_product.id_product=tbl_cart_details.pro_id AND
    tbl_cart_details.cart_code='".$codecart."' ORDER BY tbl_cart_details.id_cart_details ASC";
    $query = mysqli_query($conn, $sql);
?>
<h3>Đơn hàng</h3>
<table style="width:90%">
    <tr>
        <th>Id</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>

    <?php
        if($query){
            $i = $thanhtien = $total =0;         
            while($row = mysqli_fetch_array($query)){
                $i++;
                $thanhtien = $row['buy_quantity'] * $row['pro_price'];
                $total += $thanhtien;
    ?>

    <tr>
        <td><?= $i;?></td>
        <td><?= $row['cart_code'];?></td>
        <td><?= $row['pro_name'];?></td>
        <td><?= $row['buy_quantity'];?></td>
        <td><?php echo number_format($row['pro_price']) ." VND";?></td>
        <td><?php echo number_format($thanhtien) ." VND";?></td>
    </tr>

    <?php
            }
    ?>

    <tr>
        <td colspan='6'>Tổng tiền: <span><?php echo number_format($total) ." VND";?></span></td>
    </tr>

    <?php
        }
    ?>
</table>