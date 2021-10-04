<!-- Output Buffering -->
<?php ob_start(); ?>

<?php
// Include Database
include "db.php";

// Start A Session
session_start();
?>

<?php

if (isset($_POST['login'])) {

    $username = $_POST['username']; // Declare variables with values from the form
    $password = $_POST['password']; // Declare variables with values from the form

    // Prevent MySQL Injection -- Sorry Hackers
    $username = mysqli_real_escape_string($connection, $username); // function escapes special characters in a string for use in an SQL query
    $password = mysqli_real_escape_string($connection, $password); // function escapes special characters in a string for use in an SQL query

    $query = "SELECT * FROM users WHERE username = '{$username}' "; // Select users where the users input matches the DB value
    $selectUserQuery = mysqli_query($connection, $query); // Execute query

    if (!$selectUserQuery) { // Validate query
        die("failed" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($selectUserQuery)) { // Loop through the returned values as an assoc array from the query and set the values to PHP variables.
        $dbUserId = $row['user_id'];
        $dbUserName = $row['username'];
        $dbUserPassword = $row['user_password'];
        $dbUserFirstName = $row['user_firstname'];
        $dbUserLastName = $row['user_lastname'];
        $dbUserRole = $row['user_role'];
    }

    if (password_verify($password, $dbUserPassword)) { // Confirms a match with the hash value


        $_SESSION['userName'] = $dbUserName; // set a session of 'userName'
        $_SESSION['firstName'] = $dbUserFirstName; // set a session of 'firstName'
        $_SESSION['lastName'] = $dbUserLastName; // set a session of 'lastName'
        $_SESSION['userRole'] = $dbUserRole; // set a session of 'userRole'

        header("Location: ../admin"); // Redirect to Admin page if password is verified
    } else {
        header("Location: ../index.php"); // Redirect to the same page to reattempt to login if password fails to verify
    }
}

?>