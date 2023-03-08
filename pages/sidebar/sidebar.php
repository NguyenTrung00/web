<?php
    $sql = "SELECT * FROM tbl_category ORDER BY id_category ASC";
    $sql_query = mysqli_query($conn, $sql);
?>
<div class="sidebar">
    <span>Hãng:</span>

    <ul class="nav">
        <?php
            while($row = mysqli_fetch_array($sql_query)){
        ?>
        <li><a href="index.php?action=category&&id=<?=$row['id_category'];?>"><?=$row['cate_name'];?></a></li>
        <?php
            }
        ?>
    </ul>
</div>