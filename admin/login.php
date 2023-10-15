<?php include('../config/constants.php'); ?>

<head>
    <title>Login - WowFood</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">LogIn</h1>
        <br><br>
        <?php
            if (isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if (isset($_SESSION['no-login-message'])){
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <br><br>
        <!-- Login form starts here  -->
        <form action="" method="POST" class="login-form">
            username: <br>
            <input type="text" name="username" placeholder="Enter your username."><br><br>
            password:<br>
            <input type="password" name="password" placeholder="Enter your password."><br><br>
            <input type="submit" name="submit" value="LogIn" class="btn-primary "><br><br>
        </form>
        <!-- Login form ends here  -->
        <p class="text-center">2023 All rights reserved.</p>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // insert data into sql database
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $_SESSION['login'] = '<div class="success">LogIn successfully</div>';
        $_SESSION['user'] = $username;

        header("location:" . SITEURL . 'admin/');
    } else {
        $_SESSION['login'] = '<div class="error text-center">Username and password incorrect.</div>';
        header("location:" . SITEURL . 'admin/login.php');
    }
}
?>