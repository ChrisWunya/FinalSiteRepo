<?php
global $connection;
if (isset($_POST['createPost'])) {

    $postTitle = $_POST['title'];
    $postAuthor = $_POST['author'];
    $postCategoryId = $_POST['post_category'];
    $postStatus = $_POST['postStatus'];

    $postImage = $_FILES['image']['name'];
    $postImageTemp = $_FILES['image']['tmp_name']; // save to a temperory location in the server, PHP stores the temporary location under tmp_name 

    $postTags = $_POST['postTags'];
    $postContent = $_POST['postContent'];
    $postDate = date('d-m-y');

    move_uploaded_file($postImageTemp, "../img/$postImage");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES({$postCategoryId}, '{$postTitle}', '{$postAuthor}', now(), '{$postImage}', '{$postContent}', '{$postTags}', '{$postStatus}')";

    $createPostQuery = mysqli_query($connection, $query);

    errorCheckQuery($createPostQuery);

    $the_post_id = mysqli_insert_id($connection);

    echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Add More Posts</a> </p>";
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <select name="post_category" id="dropdownToEditPost">

            <?php
            $query = "SELECT * FROM categories";
            $selectCategoriesQuery = mysqli_query($connection, $query);

            errorCheckQuery($selectCategoriesQuery);
            while ($row = mysqli_fetch_assoc($selectCategoriesQuery)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <select name="postStatus" id="">
            <option value="Draft">Post Status</option>
            <option value="Approved">Publish</option>
            <option value="Draft">Draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="postImage">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input type="text" class="form-control" name="postTags">
    </div>

    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea type="text" class="form-control" name="postContent" id="summernote" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="createPost" value="Publish Post">
    </div>

</form>