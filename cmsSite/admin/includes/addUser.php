<?php

if (isset($_POST['add_user'])) { //checks whether a variable named 'add_user' is set

    $userFirstName = $_POST['user_firstname']; // Declare variables with values from the form
    $userLastName = $_POST['user_lastname']; // Declare variables with values from the form
    $userRole = $_POST['user_role']; // Declare variables with values from the form
    $userUsername = $_POST['username']; // Declare variables with values from the form
    $userEmail = $_POST['user_email']; // Declare variables with values from the form
    $userPassword = $_POST['user_password']; // Declare variables with values from the form

    $userPassword = password_hash($userPassword, PASSWORD_BCRYPT, array('cost' => 10)); // cost of 10 makes the hash rate slower -- password Hash

    // Define columns to insert into --users-- firstName,lastName, Role, userName, userEmail, userPassword
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    // Concat values to query-- firstName,lastName, Role, userName, userEmail, userPassword
    $query .= "VALUES('{$userFirstName}', '{$userLastName}', '{$userRole}', '{$userUsername}', '{$userEmail}', '{$userPassword}')";

    $createUserQuery = mysqli_query($connection, $query); // Execute Query
    errorCheckQuery($createUserQuery); // Validate Query

    echo "User Created: " . " " . "<a href='users.php'>View Users</a> "; // Display anchor tag for easier access to the users page

}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="userFirstName">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="userLastName">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>



    <div class="form-group">
        <select name="user_role" id="userRoleDropDownSelect">
            <option value="Subscriber">Select Option</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="postImage">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="userUsername">User Name</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="userEmail">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="userPassword">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
    </div>

</form>