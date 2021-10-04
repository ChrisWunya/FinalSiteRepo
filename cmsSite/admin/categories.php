<!-- Output Buffering -->
<?php ob_start();


?>

<!-- Header -->
<?php include "includes/adminHeader.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/adminNavigation.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin Control Center
                        <small>Author Name</small>
                    </h1>

                    <div class="col-xs-6">
                        <!-- Create category function -->
                        <?php createCategory() ?>

                        <!--  Add a category form -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat_Title">Add Category</label>
                                <input class="form-control" type="text" name="catTitle">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <!-- Update and include query -->
                        <?php
                        if (isset($_GET['edit'])) {
                            // Store the value in a variable
                            $cat_id = $_GET['edit'];

                            // Include update field if an 'edit' value is found
                            include "includes/updateCategories.php";
                        }
                        ?>
                    </div>

                    <!-- Categories table -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- Find all categories function -->
                                <?php findAllCategories(); ?>

                                <!-- Delete category function -->
                                <?php deleteCategory(); ?>

                            </tbody>
                        </table>
                    </div> <!-- col-xs-6 -->
                </div> <!-- col-lg-12 -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-wrapper -->

    <!-- Footer -->
    <?php include "includes/adminFooter.php" ?>