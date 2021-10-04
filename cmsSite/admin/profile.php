<!-- Header -->
<?php include "includes/adminHeader.php" ?>
<!-- Navigation -->
<?php include "includes/adminNavigation.php" ?>
<!-- Output Buffering -->
<?php ob_start(); ?>

<div id="wrapper">



    <?php


    if (isset($_SESSION['userName'])) {

        $userUsername = $_SESSION['userName'];

        $query = "SELECT * FROM users WHERE username = '{$userUsername}'";

        $selectUserProfileQuery = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($selectUserProfileQuery)) {

            $userId = $row['user_id'];
            $userUsername = $row['username'];
            $userPassword = $row['user_password'];
            $userFirstName = $row['user_firstname'];
            $userLastName = $row['user_lastname'];
            $userEmail = $row['user_email'];
            $userImage = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }

    ?>
    <?php

    if (isset($_POST['edit_user'])) {

        $userFirstName = $_POST['user_firstname'];
        $userLastName = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $userUsername = $_POST['username'];
        $userEmail = $_POST['user_email'];
        $userPassword = $_POST['user_password'];
        // $postDate = date('d-m-y');

        $query = "SELECT user_randSalt FROM users";
        $selectRandSaltQuery = mysqli_query($connection, $query);
        if (!$selectRandSaltQuery) {
            die("Query Failed" . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($selectRandSaltQuery);
        $salt = $row['user_randSalt'];
        $hashedPassword = crypt($userPassword, $salt);

        // Query to EDIT user
        $queryUpdate = "UPDATE users SET ";
        $queryUpdate .= "user_firstname = '{$userFirstName}', ";
        $queryUpdate .= "user_lastname = '{$userLastName}', ";
        $queryUpdate .= "user_role = '{$user_role}', ";
        $queryUpdate .= "username = '{$userUsername}', ";
        $queryUpdate .= "user_email = '{$userEmail}', ";
        $queryUpdate .= "user_password = '{$hashedPassword}' ";
        $queryUpdate .= "WHERE username = '{$userUsername}'";

        $editUserQuery = mysqli_query($connection, $queryUpdate); // Execute Query
        errorCheckQuery($editUserQuery);
    }
    ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome To Admin Control Center
                        <small>Author Name</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input type="text" value="<?php echo $userFirstName; ?>" class="form-control"
                                name="user_firstname">
                        </div>

                        <div class="form-group">
                            <label for="post_status">Last Name</label>
                            <input type="text" value="<?php echo $userLastName; ?>" class="form-control"
                                name="user_lastname">
                        </div>


                        <div class="form-group">

                            <select name="user_role" id="">

                                <option value="Subscriber"><?php echo $user_role; ?></option>
                                <?php

                                if ($user_role == 'Admin') {

                                    echo "<option value='Subscriber'>Subscriber</option>";
                                } else {
                                    echo "<option value='Admin'>Admin</option>";
                                }
                                ?>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="post_tags">User Name</label>
                            <input type="text" value="<?php echo $userUsername; ?>" class="form-control"
                                name="username">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Email</label>
                            <input type="email" value="<?php echo $userEmail; ?>" class="form-control"
                                name="user_email">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Password</label>
                            <input type="password" class="form-control" name="user_password">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                        </div>

                    </form>

                    <?php



                    ?>


                </div> <!-- row -->
            </div> <!-- container-fluid -->
        </div> <!-- page-wrapper -->

        <!-- Footer -->
        <?php include "includes/adminFooter.php" ?>