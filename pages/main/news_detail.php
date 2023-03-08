<?php
    if(isset($_GET['action']) && $_GET['action'] == "baiviet"){
        $id = $_GET['idnews'];
    }
    $sql  = "SELECT * FROM tbl_news WHERE id_news='".$id."' LIMIT 1";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
?>
<div class="container">
    <div class="image">
        <img src="admin/modules/news/uploads/<?=$row['image'];?>" alt="">
    </div>
    <div class="content">
        <p class="content_detail"><?=$row['content'];?></p>
    </div>
</div>