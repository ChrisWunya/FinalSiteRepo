<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comments</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Deny</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $query = "SELECT * FROM comments";
        $selectCommentsQuery = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($selectCommentsQuery)) {
            $commentId = $row['comment_id'];
            $commentPostId = $row['comment_post_id'];
            $commentAuthor = $row['comment_author'];
            $commentEmail = $row['comment_email'];
            $commentContent = $row['comment_content'];
            $commentStatus = $row['comment_status'];
            $commentDate = $row['comment_date'];


            echo "<tr>";
            echo "<td>$commentId</td>";
            echo "<td>$commentAuthor</td>";
            echo "<td>$commentContent</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = {$postCategoryId}";
            // $selectCategoriesIdQuery = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($selectCategoriesIdQuery)) {
            //     $catId = $row['cat_id'];
            //     $catTitle = $row['cat_title'];
            //     echo "<td>{$catTitle}</td>";
            // }




            echo "<td>$commentEmail</td>";
            echo "<td>$commentStatus</td>";
            $query = "SELECT * FROM posts WHERE post_id = $commentPostId";
            $selectPostIdQuery = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($selectPostIdQuery)) {
                $postId = $row['post_id'];
                $postTitle = $row['post_title'];

                echo "<td><a href='../post.php?p_id=$postId'>$postTitle</a></td>";
            }

            echo "<td>$commentDate</td>";

            echo "<td><a href='comments.php?approve=$commentId'>Approve</a></td>";
            echo "<td><a href='comments.php?deny=$commentId'>Deny</a></td>";
            echo "<td><a href='comments.php?delete=$commentId'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

</table>
</tbody>

<?php

// CRUD FOR THE COMMENTS

// Approve Comment
if (isset($_GET['approve'])) {

    $theCommentId = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'Approve' WHERE comment_id = $theCommentId";
    $approveCommentQuery = mysqli_query($connection, $query);
    header("Location: comments.php");
}


// Deny Comment
if (isset($_GET['deny'])) {

    $theCommentId = $_GET['deny'];

    $query = "UPDATE comments SET comment_status = 'Denied'";
    $denyCommentQuery = mysqli_query($connection, $query);
    header("Location: comments.php");
}



// Delete Comment
if (isset($_GET['delete'])) {

    $theCommentId = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$theCommentId}";
    $deleteCommentQuery = mysqli_query($connection, $query);
    header("Location: comments.php");
}











?>