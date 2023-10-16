<?php include('partials/menu.php'); ?>
<!-- Main content section starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <!-- Button to add admin -->
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        // if (isset($_SESSION['delete'])) {
        //     echo $_SESSION['delete'];
        //     unset($_SESSION['delete']);
        // }
        // if (isset($_SESSION['update'])) {
        //     echo $_SESSION['update'];
        //     unset($_SESSION['update']);
        // }
        // if (isset($_SESSION['user-not-found'])) {
        //     echo $_SESSION['user-not-found'];
        //     unset($_SESSION['user-not-found']);
        // }
        // if (isset($_SESSION['password-not-match'])) {
        //     echo $_SESSION['password-not-match'];
        //     unset($_SESSION['password-not-match']);
        // }
        // if (isset($_SESSION['change-password'])) {
        //     echo $_SESSION['change-password'];
        //     unset($_SESSION['change-password']);
        // }
        ?>
        <br><br><br>
        <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br><br><br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn=1;
            if($count>0){
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>
                        <tr>
                            <td>
                                <?php echo $sn++ . '->'; ?>
                            </td>
                            <td>
                                <?php echo $title; ?>
                            </td>
                            <td>
                                <?php 
                                    if($image_name!=""){
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="40px">
                                        <?php
                                    }
                                    else{
                                        echo "<div class='error'>Image Not Added</div>";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php echo $featured; ?>
                            </td>
                            <td>
                                <?php echo $active; ?>
                            </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>"
                                    class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>" class="btn-danger">Delete
                                    Category</a>
                            </td>
                        </tr>

                        <?php
                }
            }
            else{
                ?>
                <tr>
                    <td colspan="6"><div class="error">No Category Added.</div></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <!-- Main content section ends -->
    <?php include('partials/footer.php'); ?>