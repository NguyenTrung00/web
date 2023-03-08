<?php
    include "../../config/config.php";
    if(isset($_GET['codecart'])){
        $codecart = $_GET['codecart'];

        $query = mysqli_query($conn, "UPDATE tbl_cart SET cart_stt=0 WHERE cart_code='".$codecart."'");
        
        if($query){
            header("Location:../../?action=quanlidonhang&&mange=donhang");
        } else {
            echo "that bai";
        }
    }
?>