<?php
    $sql = "SELECT * FROM  tbl_product, tbl_category WHERE tbl_product.id_category=tbl_category.id_category AND id_product = '".$_GET['idsanpham']."' LIMIT 1";
    $sql_query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($sql_query);
?>
<h3>Thông tin chi tiết sản phẩm</h3>
<div class="left">
    <img src="admin/modules/product/uploads/<?=$row['picture'];?>" >
</div>

<div class="right">
    <form action="pages/main/add_cart.php?idsanpham=<?=$row['id_product'];?>" method="post">
        <ul>
            <li>Tên sản phẩm: <span><?=$row['pro_name'];?></span></li>
            <li>Mã sản phẩm: <?=$row['pro_code'];?></li>
            <li>Giá sản phẩm: <span><?php echo number_format($row['pro_price'])." VND";?></span></li>
            <li>Số lượng: <?=$row['quantity'];?></li>
        </ul>

        <div class="buy">
            <input type="submit" value="Thêm giỏ hàng" name="add_cart" class="add_cart">
        </div>
    </form>
</div>
<div class="clearly"></div>
<div class="tabs">
  <ul id="tabs-nav">
    <li><a href="#tab1">Cấu hình</a></li>
    <li><a href="#tab2">Nội dung</a></li>
    <li><a href="#tab3">Hình ảnh</a></li>
  </ul> <!-- END tabs-nav -->
  <div id="tabs-content">
    <div id="tab1" class="tab-content">
      <p><?=$row['summary'];?></p>
    </div>
    <div id="tab2" class="tab-content">
      <p><?=$row['content'];?></p>
    </div>
    <div id="tab3" class="tab-content">
      <p>
        <img src="admin/modules/product/uploads/<?=$row['picture'];?>" alt="">
    </p>
    </div>

  </div> <!-- END tabs-content -->
</div> <!-- END tabs -->