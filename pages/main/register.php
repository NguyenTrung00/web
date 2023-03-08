<?php
    // session_start();

    if(isset($_POST['register'])) {
        $cus_name = $_POST['cus_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = md5($_POST['password']);
        $re_password = md5($_POST['re_password']);

        if($password == $re_password) {
            $sql = "INSERT INTO tbl_register(cus_name,email,phone,address,password,re_password) VALUES('".$cus_name."','".$email."','".$phone."',
                '".$address."','".$password."','".$re_password."')";

            $sql_query = mysqli_query($conn, $sql);

            if($sql_query){
                $_SESSION['register'] = $cus_name;
                $_SESSION['customer_id'] = mysqli_insert_id($conn);
                header("Location:?action=cart&&mange=add");
            }
        } else {
            echo "<p style='color:red'>";
            echo "Mat khau khong trung nhau";
            echo "</p>";
        }
    }
?>

<h3>Đăng ký thành viên</h3>
<form action="#" method="post">
    <table class="tbl_register">
        <tr>
            <td>Tên khách hàng</td>
            <td><input type="text" name="cus_name" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="password" ></td>
        </tr>
        <tr>
            <td>Nhập lại mật khẩu</td>
            <td><input type="password" name="re_password"></td>
        </tr>
        <tr>
            <td colspan='2'><input type="submit" value="Đăng Ký" name="register" class="btn_register"></td>
        </tr>
    </table>
</form>