<?php
    session_start();
    include "config/config.php";
    
    if(isset($_POST['login_admin'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE admin_name='".$username."' AND password='".$password."' LIMIT 1";
        $sql_query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($sql_query);

        if($row > 0){
            $_SESSION['admin'] = $username;
            header("Location:index.php");
        } else {
            header("Location:login.php");
        }
    }  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="wrapper_admin">
        <form action="login.php" method="post" autocomplete="off">
            <h1>Login</h1>
            <div>
                <span class="username">Username</span>
                <input type="text" name="username" placeholder="Type admin's username">
            </div>
            <div>
                <span class="password">Password</span>
                <input type="password" name="password" placeholder="Type admin's password">
            </div>
            <input type="submit" value="Login" name="login_admin" class="btn_login">
        </form>
    </div>

    <!-- icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>