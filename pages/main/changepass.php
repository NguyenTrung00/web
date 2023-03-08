<?php
    if(isset($_POST['save'])){
        $email = $_POST['email'];
        $oldPass = md5($_POST['oldPass']);
        $newPass = md5($_POST['newPass']);

        $sql = "SELECT * FROM tbl_register WHERE password='".$oldPass."' AND email='".$email."' LIMIT 1";
        $query = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($query);
        
        if($count>0){
            $query = mysqli_query($conn, "UPDATE tbl_register SET password='".$newPass."'");
            if($query) {
                echo "<span style='color:green'>Change password successfully</span>";
            } else {
                echo "<span style='color:red'>Change password failed</span>";
            }
        } else {
            echo "<span style='color:red'>Your email and password don't match!.Please, type again.</span>";
        }
    }
?>

<h3>Đổi mật khẩu</h3>
<table style="width:50%">
    <form action="" method="POST" >
        <tr>
            <td>email</td>
            <td><input type="text" name="email" style="height:50px; width:100%;"></td>
        </tr>
        <tr>
            <td>Mật khẩu cũ</td>
            <td><input type="password" name="oldPass" style="height:50px; width:100%;"></td>
        </tr>
        <tr>
            <td>Mật khẩu mới</td>
            <td><input type="password" name="newPass" style="height:50px; width:100%;"></td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="Lưu" name="save" style="width:20%; height:30px; cursor:pointer;color:white;background:red;border:none"></td>
        </tr>
    </form>
</table>