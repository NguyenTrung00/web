<?php
    $sql = "SELECT * FROM tbl_news ";
    $query = mysqli_query($conn, $sql);
?>
<h3>Danh sách bài viết</h3>
<table style="width:90%">
    <tr>
        <th>ID</th>
        <th>Tên bài viết</th>
        <th>Hình ảnh</th>
        <th>Tóm tắt nội dung</th>
        <th>Nội dung</th>
        <th>Tình trạng</th> 
        <th>Quản lí</th> 
    </tr>
    <?php
        if($query){
            $i=0;
            while($row = mysqli_fetch_array($query)){
                $i++;
    ?>
    <tr>
        <td><?=$i;?></td>
        <td><?=$row['news_name'];?></td>
        <td>
            <img src="modules/news/uploads/<?= $row['image'];?>" style="width:100px;height:100px">
        </td>
        <td><?=$row['summary'];?></td>
        <td><?=$row['content'];?></td>
        <td>
            <?php
                if($row['status'] == 1){
                    echo "Posted";
                } else {
                    echo "Hidden";
                }
            ?>
        </td>
        <td>
            <a href="modules/news/progress.php?idDel=<?=$row['id_news']?>">Xóa</a> | 
            <a href="?action=quanlibaiviet&&mange=modify&&id=<?=$row['id_news'];?>">Sửa</a>
        </td>
    </tr>
    <?php
            }
        }
    ?>
</table>