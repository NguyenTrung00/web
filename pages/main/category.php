<?php

    $sql = "SELECT * FROM tbl_product WHERE id_category = '".$_GET['id']."' ORDER BY tbl_product.id_product DESC";
    $sql_query = mysqli_query($conn, $sql);
    $sql_category = "SELECT * FROM tbl_category WHERE id_category = '".$_GET['id']."' LIMIT 1";
    $sql_query_cate = mysqli_query($conn, $sql_category);

?>

<ul class="product_list">
    <?php
        while($row = mysqli_fetch_array($sql_query)){
    ?>
    <li>
        <a href="?action=product&&idsanpham=<?=$row['id_product'];?>">
            <img src="admin/modules/product/uploads/<?=$row['picture'];?>" >
            <p class="title_product"><?=$row['pro_name'];?></p>
            <p class="price"><?php echo number_format($row['pro_price']). " VND";?></p>
        </a>
    </li>
    <?php
        }
    ?>
</ul>
