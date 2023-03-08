<?php
    $sql = "SELECT * FROM tbl_news WHERE status=1 ORDER BY id_news DESC";
    $query = mysqli_query($conn, $sql);

?>

<ul class="product_list">
    <?php
        if($query){
            while($row = mysqli_fetch_array($query)){

    ?>
    <li>
        <a href="?action=baiviet&&idnews=<?=$row['id_news'];?> ">
            <img src="assets/image/iphone-14-mau-den.jpg.webp" alt="">
            <p class="news_name">Tiêu đề: <?=$row['news_name'];?></p>
            <p class="summary"><?=$row['summary'];?></p>
        </a>
    </li>
    <?php
            }
        }
    ?>
</ul>