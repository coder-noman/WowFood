<?php include('partials/menu.php'); ?>
<!-- Main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" Name="full_name" placeholder="Enter Your Name."></td>
                </tr>
                <tr>
                    <td>username</td>
                    <td><input type="text" Name="username" placeholder="Enter Your Username."></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" Name="password" placeholder="Enter Your password."></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- Main content section ends -->
    <?php include('partials/footer.php'); ?>

    <?php
    if (isset($_POST['submit'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // insert data into sql database
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";
        $res = mysqli_query($conn,$sql) or die(mysqli_connect_error());
        if($res == TRUE){
            // echo "Data Inserted";
            $_SESSION['add'] = '<div class="success">admin added successfully</div>';
            header("location:" .SITEURL.'admin/manage-admin.php');
        }
        else{
            // echo "Data Not Inserted";
            $_SESSION['add'] = '<div class="error">Failed to add admin</div>';
            header("location:" .SITEURL."admin/add-admin.php");
        }
    }
    ?>