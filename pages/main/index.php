<?php
    include "admin/config/config.php";
    $page = $begin = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = "";
    }

    if($page == "" || $page == 1){
        $begin = 1 ;
    } else {
        $begin = ($page*3) - 3;
    }

    $sql = "SELECT * FROM tbl_product ORDER BY id_product DESC LIMIT $begin,3";
    $sql_query = mysqli_query($conn, $sql);
?>

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
<div class="clearly"></div>
<ul class="page_list">
    <?php
        $query_pro = mysqli_query($conn,"SELECT * FROM tbl_product ");
        $pro_count = mysqli_num_rows($query_pro);
        $row_count = ceil($pro_count / 3);

        if($page == ""){
    ?>
    <p class="page">Trang: <?php echo "1/".$row_count;?></p>
    <?php
        } else {
    ?>
    <p class="page">Trang: <?php echo $page."/".$row_count;?></p>
    <?php   
        }
    ?>
    <?php
        for($i = 1; $i <= $row_count; $i++){
    ?>
    <li><a class="<?php echo ($page == $i) ? 'page_item' : '';?>" href="?page=<?=$i;?>"><?= $i;?></a></li>
    <?php
        }
    ?>
</ul>
