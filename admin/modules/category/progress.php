<?php
    include '../../config/config.php';
    if(isset($_POST['add_category'])){
        $cate_name = $_POST['cate_name'];
        $cate_ordered = $_POST['ordered'];

        $sql = "INSERT INTO tbl_category(cate_name, ordered) VALUE('".$cate_name."', '".$cate_ordered."')";
        $sql_query = mysqli_query($conn, $sql);
        if($sql_query){
            header("Location:../../index.php?action=quanlidanhmuc&&mange=add");
        }
    } elseif(isset($_POST['update_category'])){       
        $id =$_GET['iddanhmuc'];
        $cate_name = $_POST['cate_name'];
        $cate_ordered = $_POST['ordered'];
        
        $sql = "UPDATE tbl_category SET cate_name ='".$cate_name."', ordered ='".$cate_ordered."' WHERE id_category = '".$id."'";
        $sql_query = mysqli_query($conn, $sql);

        if($sql_query){
            header("Location:../../index.php?action=quanlidanhmuc&&mange=add");
        } else {
            echo "That bai.";
        }
    } else {
        $id = $_GET['iddanhmuc'];
        $sql = "DELETE FROM tbl_category WHERE id_category ='".$id."' LIMIT 1";
        $sql_query = mysqli_query($conn, $sql);

        if($sql_query){
            header("Location:../../index.php?action=quanlidanhmuc&&mange=add");
        } else {
            echo "That bai";
        }
    }