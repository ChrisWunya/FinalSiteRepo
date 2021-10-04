<!-- Output Buffering -->
<?php ob_start(); ?>

<!-- Header -->
<?php include "includes/adminHeader.php" ?>


<?php

if (!is_admin($_SESSION['userName'] == 'Admin')) {
    header("Location: index.php");
}



?>




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

                    <?php

                    if (isset($_GET['source'])) {

                        $source = $_GET['source'];
                    } else {

                        $source = '';
                    }

                    switch ($source) {

                        case 'add_user';
                            include "includes/addUser.php";
                            break;

                        case 'editUser';
                            include "includes/editUser.php";
                            break;

                        case '200';
                            echo "GOOD";
                            break;

                        default;

                            include "./includes/viewAllUsers.php";

                            break;
                    }

                    ?>


                </div> <!-- row -->
            </div> <!-- container-fluid -->
        </div> <!-- page-wrapper -->

        <!-- Footer -->
        <?php include "includes/adminFooter.php" ?>