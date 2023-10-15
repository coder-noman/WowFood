<?php include('partials/menu.php'); ?>
<!-- Main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                $rows = mysqli_fetch_assoc($res);
                $id = $rows['id'];
                $full_name = $rows['full_name'];
                $username = $rows['username'];
            } else {
                header("location:" . SITEURL . 'admin/manage-admin.php');
            }
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Id</td>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td><input type="hidden" Name="id" value="<?php echo $id; ?>"></td>
                </tr>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" Name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td>username</td>
                    <td><input type="text" Name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- Main content section ends -->
    <?php
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // insert data into sql database
        $sql = "UPDATE tbl_admin SET
            full_name = '$full_name',
            username = '$username'
            WHERE id='$id'
        ";
        $res = mysqli_query($conn, $sql);
        if ($res == TRUE) {
            // echo "Data Inserted";
            $_SESSION['update'] = '<div class="success">Admin Updated Succesfully.</div>';
            header("location:" . SITEURL . 'admin/manage-admin.php');
        } else {
            // echo "Data Not Inserted";
            $_SESSION['update'] = '<div class="error">Failed to Update Admin.Try Again later.</div>';
            header("location:" . SITEURL . "admin/manage-admin.php");
        }
    }
    ?>
    <?php include('partials/footer.php'); ?>