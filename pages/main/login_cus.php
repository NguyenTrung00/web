<?php
    $sql = "SELECT * FROM tbl_register ";
    $sql_query = mysqli_query($conn, $sql);

    if(isset($_POST['login_cus'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $pound = false;

        while($row = mysqli_fetch_array($sql_query)){
            if($email == $row['email'] && $password == $row['password']){
                $_SESSION['register'] = $row['cus_name'];
                $_SESSION['customer_id'] = $row['id_customer'];
                $pound = true;
            }
        }

        if($pound == false){
            echo "<p>";
            echo "Thông tin không chính xác. Vui lòng nhập lại!!!";
            echo "</p>";
        } else {
            header("Location:index.php");
        }
    }
?>

<h3>Đăng nhập</h3>
<form action="#" method="post">
    <table style="width:50%; margin-top:20px">
        <tr>
            <td>Email</td>
            <td ><input type="text" name="email" style="width:100%;height:50px; padding-left:20px"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="password" style="width:100%;height:50px; padding-left:20px"></td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="Đăng nhập" name="login_cus" style="width:200px;height:40px;background:red;color:white;border:none;cursor:pointer"></td>
        </tr>
    </table>
</form>