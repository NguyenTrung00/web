<?php
    session_start();
    include "../../admin/config/config.php";

    if(isset($_SESSION['customer_id'])){
        $customer_id = $_SESSION['customer_id'];
        $cart_ordered = rand(1,9999);

        $sql = "INSERT INTO tbl_cart(id_customer,cart_code,cart_stt) VALUES('".$customer_id."','".$cart_ordered."',1)";
        $sql_query = mysqli_query($conn, $sql);
        
        if($sql_query){
            foreach($_SESSION['cart'] as $key => $value){
                $pro_id = $value['id'];
                $quantity = $value['quantity'];

                $cart_sql = "INSERT INTO tbl_cart_details(cart_code,pro_id,buy_quantity) VALUES('".$cart_ordered."','".$pro_id."','".$quantity."')";
                mysqli_query($conn, $cart_sql);
            }
        }

        unset($_SESSION['cart']);
        header("Location:../../index.php?action=thanks");
    }
?>