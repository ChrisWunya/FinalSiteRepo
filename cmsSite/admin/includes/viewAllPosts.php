<?php

if (isset($_POST['checkBoxArray'])) {

    foreach ($_POST['checkBoxArray'] as $postValueId) { // Loop through checkbox array and iterate over every post_id

        $bulkOptions = $_POST['bulkOptions'];

        switch ($bulkOptions) { // #bulkOptions will store the value of the checkbox as a variable

            case 'Approve': // if the value is Approve:
                $query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id={$postValueId}"; // update post_status to match value of Approve
                $updateToApprovedStatusQuery = mysqli_query($connection, $query);
                errorCheckQuery($updateToApprovedStatusQuery);
                break;

            case 'Draft': // if the value is Draft:
                $query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id={$postValueId}"; // update post_status to match value of Draft
                $updateToDraftedStatusQuery = mysqli_query($connection, $query);
                errorCheckQuery($updateToDraftedStatusQuery);
                break;

            case 'Delete': // if the value is Delete:
                $query = "DELETE FROM posts WHERE post_id={$postValueId}"; // delete post from database
                $deletePostQuery = mysqli_query($connection, $query);
                errorCheckQuery($deletePostQuery);
                break;


            case 'Clone': // if the value is Clone:

                $query = "SELECT * FROM posts WHERE post_id={$postValueId} ";
                $selectPostQuery = mysqli_query($connection, $query);
                errorCheckQuery($selectPostQuery);

                while ($row = mysqli_fetch_array($selectPostQuery)) { // While there IS a row to iterate over, then iterate over it in an array.
                    $postTitle = $row['post_title'];
                    $postCategoryId = $row['post_category_id'];
                    $postDate = $row['post_date'];
                    $postAuthor = $row['post_author'];
                    $postStatus = $row['post_status'];
                    $postImage = $row['post_image'];
                    $postTags = $row['post_tags'];
                    $postContent = $row['post_content'];
                }

                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
                $query .= "VALUES({$postCategoryId}, '{$postTitle}', '{$postAuthor}', now(), '{$postImage}', '{$postContent}', '{$postTags}', '{$postStatus}')";
                $copyPostQuery = mysqli_query($connection, $query);

                if (!$copyPostQuery) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                break;
        }
    }
}

?>

<form action="" method="post">

    <table class="table table-bordered table-hover">
        <div id="bulkOptionsContainer" class="col-xs-4">

            <select class="form-control" name="bulkOptions" id="">
                <option value="">Select Options</option>
                <option value="Approve">Approve</option>
                <option value="Draft">Draft</option>
                <option value="Delete">Delete</option>
                <option value="Clone">Clone</option>
            </select>
        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=addPost">Add New</a>
        </div>
</form>

<thead>
    <tr>
        <th><input id="selectAllBoxes" type="checkbox"></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>View Post</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Views</th>
    </tr>
</thead>

<tbody>


    <?php
    // Display Posts Query
    $query = "SELECT * FROM posts ORDER BY post_id DESC"; // Sort posts on page in descending order to make newest appear at the top
    $selectPostsQuery = mysqli_query($connection, $query); // Execute Query

    while ($row = mysqli_fetch_assoc($selectPostsQuery)) {
        $postId = $row['post_id'];
        $postAuthor = $row['post_author'];
        $postTitle = $row['post_title'];
        $postCategoryId = $row['post_category_id'];
        $postStatus = $row['post_status'];
        $postImage = $row['post_image'];
        $postTags = $row['post_tags'];
        $postCommentCount = $row['post_comment_count'];
        $postDate = $row['post_date'];
        $postViewCount = $row['post_views_count'];

        echo "<tr>";
    ?>

    <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $postId ?>'></td>

    <?php
        echo "<td class='text-center'>$postId</td>";
        echo "<td class='text-center'>$postAuthor</td>";
        echo "<td class='text-center'>$postTitle</td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$postCategoryId}";
        $selectCategoriesIdQuery = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($selectCategoriesIdQuery)) {
            $catId = $row['cat_id'];
            $catTitle = $row['cat_title'];
            echo "<td class='text-center'>{$catTitle}</td>";
        }

        echo "<td class='text-center'>$postStatus</td>";
        echo "<td><img width='100' src='../img/$postImage' alt='image' </td>";
        echo "
        <td class='text-center'>$postTags</td>";
        echo "<td class='text-center'>$postCommentCount</td>";
        echo "<td class='text-center'>$postDate</td>";
        echo "<td class='text-center'><a href='../post.php?p_id={$postId}'>View Post</a></td>";
        echo "<td class='text-center'><a href='posts.php?source=editPost&p_id={$postId}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$postId}'>Delete</a></td>";
        echo "<td class='text-center'><a href='posts.php?reset={$postId}'>{$postViewCount}</a></td>";
        echo "</tr>";
    }
    ?>

    </table>
</tbody>

<?php
if (isset($_GET['delete'])) {

    $thePostId = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$thePostId}";
    $deletePostQuery = mysqli_query($connection, $query);
    header("Location: posts.php");
}

if (isset($_GET['reset'])) {

    $thePostId = $_GET['reset'];

    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
    $resetViewstQuery = mysqli_query($connection, $query);
    header("Location: posts.php");
}
?>