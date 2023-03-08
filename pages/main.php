<section id="main">
    <?php
        include 'sidebar/sidebar.php';
    ?>

    <div class="main_content">
        <?php
            if(isset($_GET['action'])){
                $tmp = $_GET['action'];
            } else {
                $tmp = "";
            }
            if($tmp == 'category'){
                include 'main/category.php';
            } elseif($tmp == 'cart' ){
                include 'main/cart.php';
            } elseif($tmp == 'news') {
                include 'main/news.php';
            } elseif($tmp == 'product'){
                include 'main/product.php';
            } elseif($tmp == 'register') {
                include 'main/register.php';
            } elseif($tmp == 'payment'){
                include 'main/payment.php';
            } elseif($tmp == 'login_cus'){
                include 'main/login_cus.php';
            } elseif($tmp == 'find_pro'){
                include "main/find_pro.php";
            } elseif($tmp == "thanks"){
                include "main/thanks.php";
            } elseif($tmp == 'changepass'){
                include "main/changepass.php";
            } elseif($tmp == "baiviet"){
                include "main/news_detail.php";
            }
             else {
                include 'main/index.php';
            }
        ?>
    </div>
</section>