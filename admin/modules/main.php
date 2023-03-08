<section id="main">
    <?php
        if(isset($_GET['action'])){
            $tmp = $_GET['action'];
            $mange = $_GET['mange'];
        } else {
            $tmp = "";
            $mange = "";
        }

        if($tmp == 'quanlidanhmuc' && $mange == 'add'){
            include 'category/add.php';
            include 'category/listed.php';
        } elseif($tmp == "quanlisanpham" && $mange == 'add') {
            include 'product/add.php';
            include 'product/listed.php';
        } elseif($tmp == 'quanlidanhmuc' && $mange == 'modify'){
            include 'category/modify.php';
        } elseif($tmp == "quanlisanpham" && $mange == 'modify'){
            include 'product/modify.php';
        } elseif($tmp == "quanlidonhang" && $mange == "donhang"){
            include "payment/listed.php";
        } elseif($tmp == "quanlidonhang" && $mange == "order"){
            include "payment/order.php";
        } elseif($tmp == "quanlibaiviet" && $mange == "add"){
            include "news/add.php";
            include "news/listed.php";
        } elseif($tmp == "quanlibaiviet" && $mange == "modify"){
            include "news/modify.php";
        }
        else {
            echo "Welcome to dashboard";
        }
    ?>
</section>
