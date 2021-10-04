<?php
ob_start();

function errorCheckQuery($result)
{
    global $connection;

    if (!$result) {
        die('QUERY FAILED ERROR' . mysqli_error($connection));
    }
}

// Create new category function
function createCategory()
{
    global $connection;

    if (isset($_POST['submit'])) {
        // Store the value in a variable
        $cat_title = $_POST["catTitle"];

        // If category title field is empty
        if ($cat_title == "" || empty($cat_title)) {
            echo "This Field Cannot Not Be Empty!";
        } else {

            // Insert new category into DB
            $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
            $createCategoryQuery = mysqli_query($connection, $query);

            // Manually refresh the page and redirect to current page to prevent duplicate categories
            header('Location: ' . $_SERVER['PHP_SELF']);
        }
    }
}

// Find all categories function
function findAllCategories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $selectCategoriesQuery = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($selectCategoriesQuery)) {
        $catId = $row['cat_id'];
        $catTitle = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$catId}</td>";
        echo "<td>{$catTitle}</td>";
        echo "<td><a href='categories.php?delete={$catId}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$catId}'>Edit</a></td>";
        echo "</tr>";
    }
}

function deleteCategory()
{
    global $connection;

    if (isset($_GET['delete'])) {
        $theCatId = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$theCatId}";
        $deleteQuery = mysqli_query($connection, $query);

        // Refresh the page after the GET request is made
        header("Location: categories.php");
        exit;
    }
}

function escape($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, trim($string));
}



function is_admin($username = '')
{

    global $connection;

    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $queryResult = mysqli_query($connection, $query);
    errorCheckQuery($queryResult);

    $row = mysqli_fetch_array($queryResult);

    if ($row['user_role'] == 'Admin') {

        return true;
    } else {

        return false;
    }
}