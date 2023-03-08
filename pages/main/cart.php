<?php
    // session_start();
?>
<?php
    if(isset($_SESSION['register'])){
        // session_destroy();
        echo "Xin chao: <span style='color:red; margin:2px 3px'>".$_SESSION['register']. $_SESSION['customer_id']."</span>";
    }

 if(isset($_SESSION['cart'])){
?>
<h3>Giỏ hàng</h3>
<table>
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Mã sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Quản lí</th>
    </tr>
    <?php
       
        $i =0;
        $total = 0;
            foreach($_SESSION['cart'] as $cart_item){
                $i++;
                $thanhtien = $cart_item['quantity'] * $cart_item['pro_price'];
                $total += $thanhtien;
        ?>
    <tr>
        <td><?=$i;?></td>
        <td><?=$cart_item['pro_name'];?></td>
        <td>
            <img src="admin/modules/product/uploads/<?=$cart_item['image'];?>" style="width:100px; height:100px;">
        </td>
        <td><?=$cart_item['pro_code'];?></td>
        <td>
            <a href="pages/main/add_cart.php?query=plus&&idsanpham=<?=$cart_item['id'];?>" class="btn_quantity"><span>+</span></a>
            <?=$cart_item['quantity'];?>
            <a href="pages/main/add_cart.php?query=subtract&&idsanpham=<?=$cart_item['id'];?>" class="btn_quantity"><span>-</span></a>
        </td>
        <td><?php echo number_format($cart_item['pro_price']) . " VND";?></td>
        <td><?php echo number_format($thanhtien)." VND";?></td>
        <td>
            <a href="pages/main/add_cart.php?query=delete&&idsanpham=<?=$cart_item['id'];?>">Xóa</a>
        </td>
    </tr>
        <?php
            }
        ?>
    <tr>
        <td colspan='8'>
            <p class="total"><span>Tổng tiền</span> : <?php echo number_format($total)." VND";?></p>
            <p class="delete_all"><a href="pages/main/add_cart.php?xoatatca=1">Xóa tất cả</a></p>

            <div class="ordered">
                <?php
                    if(isset($_SESSION['register'])){

                ?>
                    <p><a href="pages/main/payment.php">Đặt hàng</a></p>
                <?php
                    }else {

                ?>
                <p><a href="?action=register&&mange=add">Đăng ký đặt hàng</a></p>
                <?php
                    }
                ?>
            </div>
        </td>
    </tr>
        <?php
        } else {
        ?>
    <h3>Hiện tại giỏ hàng trống</h3>
        <?php
        }
    
        ?>
        
</table>