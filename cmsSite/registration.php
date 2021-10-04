<!-- Database Connection -->
<?php include "includes/db.php"; ?>
<!-- Header -->
<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<!-- Functions -->
<?php include "admin/functions.php" ?>

<?php
if (isset($_POST['submit'])) {  //checks whether a variable named 'submit' is set

    $username = $_POST['username']; // Declare variables with values from the form
    $email = $_POST['email']; // Declare variables with values from the form
    $password = $_POST['password']; // Declare variables with values from the form

    if (!empty($username) && !empty($email) && !empty($password)) { // Validates that form fields are not empty

        $username =  mysqli_real_escape_string($connection, $username); // function escapes special characters in a string for use in an SQL query
        $email = mysqli_real_escape_string($connection, $email); // function escapes special characters in a string for use in an SQL query
        $password = mysqli_real_escape_string($connection, $password); // function escapes special characters in a string for use in an SQL query

        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12)); // cost of 10 makes the hash rate slower -- password Hash

        $query = "INSERT INTO users (username, user_email, user_password, user_role)"; // Insert user input into DB columns
        $query .= "VALUES('{$username}', '{$email}', '{$password}', 'Subscriber' )"; // Insert user input values into DB
        $registerNewUserQuery = mysqli_query($connection, $query); // Execute query

        errorCheckQuery($registerNewUserQuery); // Validate Query

        $message = "Your Registration Has Been Submitted"; // Registration Success Message

    } else {
        $message = "Fields Cannot Be Empty"; // Fields Empty Message
    }
} else {
    $message = ""; // Dont display a message
}


?>




<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                            <h5 class="text-center"><?php echo $message; ?></h5>

                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control"
                                    placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>