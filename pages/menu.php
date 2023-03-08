<?php
    session_start();


    $sql = "SELECT * FROM tbl_category ORDER BY id_category ASC";
    $sql_query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($sql_query);
?>

<?php
    if(isset($_GET['logout']) && $_GET['logout'] == '1'){
        unset($_SESSION['register']);
        header("Location:index.php");
    }
?>
<section id="menu">
    <ul class="nav">
        <li><a href="index.php">Trang chủ</a></li>

        <li><a href="index.php?action=category&&id=<?=$row['id_category'];?>">Danh mục sản phẩm</a></li>

        <li><a href="index.php?action=cart">Giỏ Hàng</a></li>
        <li><a href="index.php?action=news">Tin tức</a></li>
        <li  style="display:inline-block; background:rgba(102, 255, 255,.5); border:none; outline:none">
            <p >
                <form action="?action=find_pro" method="post" autocomplete="off">
                    <input type="text" name="key" placeholder="tìm kiếm ..." style="height:30px;padding-left:3px">
                    <input type="submit" value="Tìm kiếm" name="find_pro" style="padding:5px">
                </form>
            </p>
        </li>   
    </ul>
    <ul class="nav sub_nav">
        <?php
            if(isset($_SESSION['register'])){

        ?>

        <li style='padding:10px 20px;opacity:1;'>Xin chào: <span style='display:inline-block;color:white'><?=$_SESSION['register'];?></span></li>
        <li><a href="?action=changepass">Đổi mật khẩu</a></li>
        <li><a href="?logout=1">Đăng xuất</a></li>
        <?php        
            }else{
        ?>

        <li><a href="?action=register&&mange=add">Đăng Ký</a></li>
        <li><a href="?action=login_cus">Đăng nhập</a></li>

        <?php
            }
        ?>
    </ul>
</section>