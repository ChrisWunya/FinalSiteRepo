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
                $thePostAuthor = $_GET['author'];
            }

            $query = "SELECT * FROM posts WHERE post_author = '{$thePostAuthor}'";
            $selectAllPostsQuery = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($selectAllPostsQuery)) {

                $postTitle = $row['post_title'];
                $postAuthor = $row['post_author'];
                $postDate = $row['post_date'];
                $postImage = $row['post_image'];
                $postContent = $row['post_content'];
            ?>

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- Display Blog Post -->
            <h2>
                <a href="#"> <?php echo $postTitle; ?> </a>
            </h2>
            <p class="lead">

                All Posts By: <?php echo $postAuthor; ?>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate; ?></p>
            <hr>
            <img class="img-responsive" src="img/<?php echo $postImage; ?>" alt="">
            <hr>
            <p> <?php echo $postContent; ?> </p>
            <hr>
            <!-- Display Blog Post -->
            <?php } ?>

            <!-- Display Blog Comments -->
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
            <hr>
            <!-- Display Blog Comments -->

            <!-- Blog Comments Query -->
            <?php
            // Select everything where the comment_post_id is equal to the p_id that is received with the GET request
            // AND checks if the comment_status is APPROVED
            // Then orders the comments in order by newest first.
            $query = "SELECT * FROM comments WHERE comment_post_id = {$thePostId} AND comment_status = 'Approve' ORDER BY comment_id DESC";

            // Send query to my mysql db
            $selectCommentsQuery = mysqli_query($connection, $query);

            // Loop through the returned values as an associative array from the query and set the values to PHP variables.
            while ($row = mysqli_fetch_assoc($selectCommentsQuery)) {

                $commentContent = $row['comment_content']; // Returned query results saved as variables
                $commentAuthor = $row['comment_author']; // Returned query results saved as variables
                $commentDate = $row['comment_date']; // Returned query results saved as variables
            }
            ?>
            <!-- Blog Comments Query -->


        </div> <!-- Blog Entries Column -->


        <!-- Blog Sidebar Widgets Column -->
        <?php include 'includes/sidebar.php' ?>

    </div>
    <!-- /.row -->

    <!-- Include Footer -->
    <?php include 'includes/footer.php' ?>