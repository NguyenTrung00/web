<?php
    include "../../config/config.php";
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['save'])){
            $newsName = $_POST['newsName'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $status = $_POST['newsStatus'];

           if(isset($_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image = time()."_".$image;
           }

           $sql = "INSERT INTO tbl_news(news_name, image, summary, content, status) VALUES('".$newsName."','".$image."','".$summary."','".$content."','".$status."')";
           $query = mysqli_query($conn, $sql);

           if($query){
                move_uploaded_file($image_tmp, "uploads/".$image);
                header("Location:../../index.php?action=quanlibaiviet&&mange=add");
           } else {
            echo "That bai";
           }
        } elseif(isset($_POST['update_news'])){
            $id = $_POST['id'];
            $newsName = $_POST['newsName'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $status = $_POST['newsStatus'];
            $image = "";

            $sql = "SELECT * FROM tbl_news WHERE id_news='".$id."'";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            $found = false ;

           if(!empty($_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image = time()."_".$image;
                unlink("uploads/".$row['image']);
                $sql = "UPDATE tbl_news SET news_name='".$newsName."',image='".$image."',summary='".$summary."', content='".$content."', status='".$status."'";
                $query = mysqli_query($conn, $sql);
                move_uploaded_file($image_tmp,"uploads/$image");
                $found = true;
           } else {     
                $sql = "UPDATE tbl_news SET news_name='".$newsName."',summary='".$summary."', content='".$content."', status='".$status."'";
                $query = mysqli_query($conn, $sql);
                $found = true;
           }    

           if($found == true){
                header("Location:../../index.php?action=quanlibaiviet&&mange=add");
           } else {
                echo "That bai";
           }

        }
    } else {
        $id = $_GET['idDel'];
        $sql = "SELECT * FROM tbl_news WHERE id_news='".$id."'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $count = mysqli_num_rows($query);

        if($count > 0){
            unlink("uploads/".$row['image']);
        }

        $sql = "DELETE FROM tbl_news WHERE id_news='".$id."'";
        $query = mysqli_query($conn, $sql);
        if($query){
            header("Location:../../index.php?action=quanlibaiviet&&mange=add");
        } else {
            echo "That bai";
        }
    }
?>