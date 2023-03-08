<?php
    include "../../config/config.php";
    if(isset($_POST['add_product'])){
        $pro_name = $_POST['product_name'];
        $pro_code = $_POST['product_code'];
        $pro_price = $_POST['product_price'];
        $quantity = $_POST['quantity'];

        // Hinh anh
        if(isset($_FILES['image']['name'])){
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image = time()."_".$image;
        }

        $content = $_POST['content'];
        $summary = $_POST['summary'];
        $pro_stt = $_POST['status'];
        $id_category = $_POST['category'];

        $sql ="INSERT INTO tbl_product(pro_name,pro_code,pro_price,quantity,picture,content,summary,pro_stt,id_category) VALUES('".$pro_name."',
                '".$pro_code."','".$pro_price."','".$quantity."','".$image."','".$content."','".$summary."','".$pro_stt."','".$id_category."')";
        $sql_query = mysqli_query($conn, $sql);

        if($sql_query){
            move_uploaded_file($image_tmp,"uploads/".$image);
            header("Location:../../index.php?action=quanlisanpham&&mange=add");
        } else {
            echo "That bai";
        }
    } elseif(isset($_POST['update_product'])){
        $id = $_GET['idsanpham'];
        $pro_name = $_POST['product_name'];
        $pro_code = $_POST['product_code'];
        $pro_price = $_POST['product_price'];
        $quantity = $_POST['quantity'];
        
        
        $content = $_POST['content'];
        $summary = $_POST['summary'];
        $pro_stt = $_POST['status'];
        $id_category = $_POST['category'];
        $pound = false;
        
        $sql = "SELECT * FROM tbl_product WHERE id_product='".$id."' LIMIT 1";
        $sql_query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($sql_query);
        if(!empty($_FILES['image']['name'])){
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image = time()."_".$image; 
            unlink('uploads/'.$row['picture']);

            $sql2 = "UPDATE tbl_product SET pro_name='".$pro_name."', pro_code='".$pro_code."', pro_price='".$pro_price."',
            quantity='".$quantity."',picture='".$image."',content='".$content."',summary='".$summary."',pro_stt='".$pro_stt."',
            id_category='".$id_category."' WHERE id_product='".$id."'";
            move_uploaded_file($image_tmp, 'uploads/'.$image);
            $found = true;
        } else {
            $sql2 = "UPDATE tbl_product SET pro_name='".$pro_name."', pro_code='".$pro_code."', pro_price='".$pro_price."',
            quantity='".$quantity."',content='".$content."',summary='".$summary."',pro_stt='".$pro_stt."',
            id_category='".$id_category."' WHERE id_product='".$id."'";       
            $found = true; 
        }
            

        
        if($found == true){
            $sql_query2 = mysqli_query($conn, $sql2);
            header("Location:../../index.php?action=quanlisanpham&&mange=add");
        } else {
            echo "That bai";
        }

    }else {
        $id = $_GET['idsanpham'];

        $sql1 = "SELECT * FROM tbl_product WHERE id_product='".$id."' LIMIT 1";
        $sql_query1 = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_array($sql_query1)){
            unlink('uploads/'.$row['picture']);
        } 

        $sql2 = "DELETE FROM tbl_product WHERE id_product='".$id."' LIMIT 1";
        $sql_query2 = mysqli_query($conn, $sql2);

        if($sql_query2){
            header("Location:../../index.php?action=quanlisanpham&&mange=add");
        } else {
            echo "That bai";
        }
    }
?>