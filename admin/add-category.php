<?php include('partials/menu.php'); ?>
<!-- Main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
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
                    <td>Title:</td>
                    <td><input type="text" Name="title" placeholder="Category title"></td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" Name="featured" value="Yes">Yes
                        <input type="radio" Name="featured" value="Nes">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" Name="active" value="Yes">Yes
                        <input type="radio" Name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- Main content section ends -->
    <?php include('partials/footer.php'); ?>

    <?php

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];

        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else{
            $featured = "No";
        }
        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else{
            $active = "No";
        }
        // insert data into sql database
        $sql = "INSERT INTO tbl_category SET
            title = '$title',
            featured = '$featured',
            active = '$active'
        ";
        $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());
        if ($res == TRUE) {
            // echo "Data Inserted";
            $_SESSION['add'] = '<div class="success">Category added successfully</div>';
            header("location:" . SITEURL . 'admin/manage-category.php');
        } else {
            // echo "Data Not Inserted";
            $_SESSION['add'] = '<div class="error">Failed to add Category</div>';
            header("location:" . SITEURL . "admin/add-category.php");
        }
    }
    ?>