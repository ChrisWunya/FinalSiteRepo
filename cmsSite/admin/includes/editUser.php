<?php

if (isset($_GET['edit_user'])) {

    $theUserId = escape($_GET['edit_user']);

    $query = "SELECT * FROM users WHERE user_id = $theUserId";
    $selectUsersQuery = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($selectUsersQuery)) {

        $userId = $row['user_id'];
        $userUsername = $row['username'];
        $userPassword = $row['user_password'];
        $userFirstName = $row['user_firstname'];
        $userLastName = $row['user_lastname'];
        $userEmail = $row['user_email'];
        $userImage = $row['user_image'];
        $userRole = $row['user_role'];
    }
?>

<?php

    if (isset($_POST['edit_user'])) { // Post request to update user 

        $userFirstName = escape($_POST['user_firstname']);
        $userLastName = escape($_POST['user_lastname']);
        $userRole = escape($_POST['user_role']);
        $userUsername = escape($_POST['username']);
        $userEmail = escape($_POST['user_email']);
        $userPassword = escape($_POST['user_password']);
        $postDate = escape(date('d-m-y'));

        if (!empty($userPassword)) { // if users password input is not empty => continue

            $passwordQuery = "SELECT user_password FROM users WHERE user_id = $theUserId"; // Return users password from users table if the userID = form input
            $getUser = mysqli_query($connection, $passwordQuery); // Execute Query
            errorCheckQuery($getUser); // Validate Query

            $row = mysqli_fetch_array($getUser); // Return 1 row

            $dbUserPassword = $row['user_password']; // Return DB password to compare

            if ($dbUserPassword != $userPassword) { // if database password is not equal to form input value

                $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT, array('cost' => 12)); // cost of 10 makes the hash rate slower -- password Hash
            }

            // Query to EDIT user
            $query = "UPDATE users SET ";
            $query .= "user_firstname = '{$userFirstName}', ";
            $query .= "user_lastname = '{$userLastName}', ";
            $query .= "user_role = '{$userRole}', ";
            $query .= "username = '{$userUsername}', ";
            $query .= "user_email = '{$userEmail}', ";
            $query .= "user_password = '{$hashedPassword}' ";
            $query .= "WHERE user_id = {$theUserId} ";

            $editUserQuery = mysqli_query($connection, $query); // Execute Query
            errorCheckQuery($editUserQuery); // Validate Query

            echo "User Updated" . " <a href='users.php'>View Users?</a>"; // Display anchor tag for easier access to the users page

        } // If password is empty check ends here //

    } // Post request to update user ends here //

} else { // If the user id is not present in the URL => redirect to the home page

    header("Location: index.php"); // If there is no edit post value/name, then redirect back to home page
}




?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" value="<?php echo $userFirstName; ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" value="<?php echo $userLastName; ?>" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">

        <select name="user_role" id="userRoleDropDownSelect">

            <option value="<?php echo $userRole; ?>"><?php echo $userRole; ?></option>
            <?php

            if ($userRole == 'Admin') {
                echo '<option value="Subscriber">Subscriber</option>';
            } else {
                echo '<option value="Admin">Admin</option>';
            }
            ?>

        </select>


    </div>

    <div class="form-group">
        <label for="post_tags">User Name</label>
        <input type="text" value="<?php echo $userUsername; ?>" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" value="<?php echo $userEmail; ?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input class="form-control" type="password" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>

</form>