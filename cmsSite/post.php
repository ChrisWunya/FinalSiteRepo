<!-- Start A Session -->
<?php session_start(); ?>

<!-- Database Connection -->
<?php include 'includes/db.php' ?>

<!-- Header -->
<?php include 'includes/header.php' ?>

<!-- Navigation -->
<?php include 'includes/navigation.php' ?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            if (isset($_GET['p_id'])) {
                $thePostId = $_GET['p_id'];

                $viewQuery = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $thePostId ";
                $executeQuery = mysqli_query($connection, $viewQuery);

                if (!$executeQuery) {
                    die("QUERY FAILED");
                }

                $query2 = "SELECT * FROM posts WHERE post_id = {$thePostId}";
                $selectAllPostsQuery = mysqli_query($connection, $query2);

                while ($row = mysqli_fetch_assoc($selectAllPostsQuery)) {
                    $postTitle = $row['post_title'];
                    $postAuthor = $row['post_author'];
                    $postDate = $row['post_date'];
                    $postImage = $row['post_image'];
                    $postContent = $row['post_content']; ?>

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="#"> <?php echo $postTitle; ?> </a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $postAuthor; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate; ?></p>
            <hr>
            <img class="img-responsive" src="img/<?php echo $postImage; ?>" alt="">
            <hr>
            <p> <?php echo $postContent; ?> </p>

            <hr>

            <?php
                }
            } else {

                header("Location: index.php");
            }

            ?>

            <!-- Blog Comments -->
            <?php

            if (isset($_POST['createComment'])) {

                $postIdForQuery = $_GET['p_id'];
                $commentAuthor = $_POST['commentAuthor'];
                $commentEmail = $_POST['commentEmail'];
                $commentContent = $_POST['commentContent'];

                if (!empty($commentAuthor) && !empty($commentEmail) && !empty($commentContent)) {

                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                    $query .= "VALUES ({$postIdForQuery}, '{$commentAuthor}', '{$commentEmail}', '{$commentContent}', 'Denied', now())";

                    $createCommentQuery = mysqli_query($connection, $query);

                    errorCheckQuery($createCommentQuery);

                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $postIdForQuery";
                    $updateCommentCountQuery = mysqli_query($connection, $query);
                } else {

                    echo "<script>alert('Field Cannot Be Empty')</script>";
                }
            }
            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="POST" role="form">

                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" class="form-control" name="commentAuthor"></input>
                    </div>

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="commentEmail"></input>
                    </div>

                    <div class="form-group">
                        <label for="Comment">Comment</label>
                        <textarea class="form-control" id="summernote" name="commentContent"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" name="createComment">Submit</button>

                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            <?php
            // Select everything where the comment_post_id is equal to the p_id that is received with the GET request
            // AND checks if the comment_status is APPROVED
            // Then orders the comments in order by newest first.
            $query = "SELECT * FROM comments WHERE comment_post_id = {$thePostId} AND comment_status = 'Approve' ORDER BY comment_id DESC";

            // Send query to my mysql db
            $selectCommentsQuery = mysqli_query($connection, $query);

            // Loop through the returned values as an assoc array from the query and set the values to PHP variables.
            while ($row = mysqli_fetch_assoc($selectCommentsQuery)) {

                // Returned query results saved as variables
                $commentContent = $row['comment_content'];
                $commentAuthor = $row['comment_author'];
                $commentDate = $row['comment_date'];
            ?>

            <!-- Display Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        <?php echo $commentAuthor; ?>
                        <small>
                            <?php echo $commentDate; ?>
                        </small>
                    </h4>
                    <?php echo $commentContent; ?>
                </div>
            </div>

            <?php } ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include 'includes/sidebar.php' ?>

    </div>
    <!-- /.row -->

    <?php include 'includes/footer.php' ?>