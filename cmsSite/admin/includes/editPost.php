<?php

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$selectPostsByIdQuery = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($selectPostsByIdQuery)) {
    $postId = $row['post_id'];
    $postAuthor = $row['post_author'];
    $postTitle = $row['post_title'];
    $postCategoryId = $row['post_category_id'];
    $postStatus = $row['post_status'];
    $postImage = $row['post_image'];
    $postTags = $row['post_tags'];
    $postContent = $row['post_content'];
    $postCommentCount = $row['post_comment_count'];
    $postDate = $row['post_date'];
}

if (isset($_POST['update_post'])) {

    $postAuthor = $_POST['author'];
    $postTitle = $_POST['title'];
    $postCategoryId = $_POST['post_category'];
    $postStatus = $_POST['postStatus'];
    $postImage = $_FILES['image']['name'];
    $postimageTemp = $_FILES['image']['tmp_name'];
    $postContent = $_POST['postContent'];
    $postTags = $_POST['postTags'];

    move_uploaded_file($postimageTemp, "../img/$postImage");

    if (empty($postImage)) {

        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $selectImageQuery = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($selectImageQuery)) {
            $postImage = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$postTitle}', ";
    $query .= "post_category_id = '{$postCategoryId}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$postAuthor}', ";
    $query .= "post_status = '{$postStatus}', ";
    $query .= "post_tags = '{$postTags}', ";
    $query .= "post_content = '{$postContent}', ";
    $query .= "post_image = '{$postImage}' ";
    $query .= "WHERE post_id = '{$postId}'";

    $updatePostQuery = mysqli_query($connection, $query);
    errorCheckQuery($updatePostQuery);

    // Display anchor tag for easier access to the posts page
    echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit More Posts</a> </p>";
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class=" form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $postTitle; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <select name="post_category" id="dropdownToEditPost">

            <?php

            $query = "SELECT * FROM categories";
            $selectCategoriesQuery = mysqli_query($connection, $query);

            if (!$selectCategoriesQuery) {
                echo 'ERROR' . mysqli_error($connection);
            }

            while ($row = mysqli_fetch_assoc($selectCategoriesQuery)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];

                echo "<option value='{$catId}'>{$catTitle}</option>";
            }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $postAuthor; ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <select name="postStatus" id="">

            <!-- display the current post status from database -->
            <option value="<?php echo $postStatus ?>"><?php echo $postStatus; ?></option>

            <?php
            if ($postStatus == 'Approve') { // checks if status of the post is approve in the db
                echo "<option value='draft'>Draft</option>"; // display the option to deny a post
            } else { // if above statement is false
                echo "<option value='Approve'>Approve</option>"; // display the option to approve a post
            }
            ?>

        </select>
    </div>

    <div class="form-group">
        <img width="100" src="../img/<?php echo $postImage; ?>" alt="image">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input value="<?php echo $postTags; ?>" type="text" class="form-control" name="postTags">
    </div>

    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea type="text" class="form-control" name="postContent" id="summernote" cols="30"
            rows="10"><?php echo $postContent; ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>

</form>