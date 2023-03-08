<?php
    $sql = "SELECT * FROM tbl_cart, tbl_register WHERE tbl_cart.id_customer = tbl_register.id_customer ORDER BY tbl_cart.id_cart ASC";
    $query = mysqli_query($conn,$sql);

?>

<h3>Liệt kê các đơn hàng</h3>
<table style='width:90%'>
    <tr>
        <th>id</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Tình trạng</th>
        <th>Quản lí</th>
    </tr>

    <?php
        $i =0;
        if($query){
            while($row = mysqli_fetch_array($query)){
                $i++;
    ?>
    <tr>
        <td><?= $i;?></td>
        <td><?= $row['cart_code'];?></td>
        <td><?= $row['cus_name'];?></td>
        <td><?= $row['address'];?></td>
        <td><?= $row['email'];?></td>
        <td><?= $row['phone'];?></td>
        <td>
            <?php
                if($row['cart_stt'] == 1){
            ?>
            <a href="modules/payment/progress.php?codecart=<?=$row['cart_code'];?>">Đơn hàng mới</a>
            <?php
                }else {
            ?>
            <span>Đã xem</span>
            <?php
                }
            ?>
        </td>
        <td><a href="?action=quanlidonhang&&mange=order&&codecart=<?= $row['cart_code'];?>">Xem đơn hàng</a></td>
    </tr>

    <?php
            }
        }
    ?>
</table>