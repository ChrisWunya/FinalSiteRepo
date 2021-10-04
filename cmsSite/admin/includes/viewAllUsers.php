<!-- Output Buffering -->
<?php ob_start(); ?>
<?php
global $connection;
?>
<!-- Display Table Headers -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Make Admin</th>
            <th>Make Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $query = "SELECT * FROM users";
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

            // Display Table
            echo "<tr>";
            echo "<td>$userId</td>";
            echo "<td>$userUsername</td>";
            echo "<td>$userFirstName</td>";
            echo "<td>$userLastName</td>";
            echo "<td>$userEmail</td>";
            echo "<td>$userRole</td>";
            echo "<td><a href='users.php?change_to_admin={$userId}'>Make Admin</a></td>";
            echo "<td><a href='users.php?change_to_subscriber={$userId}'>Make Subscriber</a></td>";
            echo "<td><a href='users.php?source=editUser&edit_user={$userId}'>Edit</a></td>";
            echo "<td><a href='users.php?delete={$userId}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

</table>
</tbody>

<?php
// CRUD FOR THE USERS

// Approve User
if (isset($_GET['change_to_admin'])) {

    $theUserId = $_GET['change_to_admin'];

    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $theUserId";
    $changeUserToAdminQuery = mysqli_query($connection, $query);
    header("Location: users.php");
}

// Deny User
if (isset($_GET['change_to_subscriber'])) {

    $theUserId = $_GET['change_to_subscriber'];

    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $theUserId";
    $changeUserToSubscriberQuery = mysqli_query($connection, $query);
    header("Location: users.php");
}

// Delete User
if (isset($_GET['delete'])) {

    if (isset($_SESSION['userRole'])) { // is session of user role

        if ($_SESSION['userRole'] == 'Admin') { // if current session variable of userRole is equal to Admin -- prevents URL/MySQL Injection

            $theUserId = mysqli_escape_string($connection, $_GET['delete']); // clean up string

            $query = "DELETE FROM users WHERE user_id = {$theUserId}";
            $deleteUserQuery = mysqli_query($connection, $query);
            header("Location: users.php");
        }
    }
}
?>