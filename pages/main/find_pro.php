<?php
    if(isset($_POST['find_pro'])){
        $key = $_POST['key'];
    } else {
        $key = "";
    }

    $sql = "SELECT * FROM tbl_product,tbl_category WHERE  tbl_product.id_category = tbl_category.id_category AND (tbl_product.pro_name LIKE '%".$key."%' OR tbl_product.summary LIKE '%".$key."%') ";
    $sql_query = mysqli_query($conn, $sql);
    
?>
<h3></h3>
<ul class="product_list">
    <?php
        while($row = mysqli_fetch_array($sql_query)){
    ?>
    <li>
        <a href="?action=product&&idsanpham=<?=$row['id_product'];?>">
            <img src="admin/modules/product/uploads/<?=$row['picture'];?>" alt="iphone12">
            <p class="title_product"><?=$row['pro_name'];?></p>
            <p class="price"><?php echo number_format($row['pro_price']) ." VND";?></p>
        </a>
    </li>
    <?php
    }
    ?>
</ul>