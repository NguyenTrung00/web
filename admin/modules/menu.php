<?php
    if(isset($_GET['logout']) && $_GET['logout'] == '1'){
        unset($_SESSION['admin']);
        header("Location:login.php");
    }
?>
<section id="menu">
    <ul class="admin_list">
        <li><a href="index.php?action=quanlidanhmuc&&mange=add">Quản lí danh mục sản phẩm</a></li>
        <li><a href="index.php?action=quanlisanpham&&mange=add">Quản lí sản phẩm</a></li>
        <li><a href="index.php?action=quanlibaiviet&&mange=add">Quản lí bài viết</a></li>
        <li><a href="index.php?action=quanlidonhang&&mange=donhang">Quản lí các đơn hàng</a></li>
        <li><a href="index.php?logout=1">Đăng xuất</a></li>
        <li>Admin: <?php if(isset($_SESSION['admin'])) {
                echo $_SESSION['admin'];
            }?>
        </li>
    </ul>
</section>