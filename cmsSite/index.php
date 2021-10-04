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

            $query = "SELECT * FROM posts";
            $selectAllPostsQuery = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($selectAllPostsQuery)) {
                $postId = $row['post_id'];
                $postTitle = $row['post_title'];
                $postAuthor = $row['post_author'];
                $postDate = $row['post_date'];
                $postImage = $row['post_image'];
                $postContent = substr($row['post_content'], 0, 50);
                $postStatus = $row['post_status'];

                if ($postStatus == 'Approve') {
            ?>

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- DISPLAY BLOG POST -->
            <h2>
                <?= "what a great time"; ?>
                <a href="post.php?p_id=<?php echo $postId; ?>"> <?php echo $postTitle; ?> </a>
            </h2>
            <p class="lead">
                by <a
                    href="author_posts.php?author=<?php echo $postAuthor; ?>&p_id=<?php echo $postId; ?>"><?php echo $postAuthor; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate; ?></p>
            <hr>

            <a href="post.php?p_id= <?php echo $postId; ?>">
                <img class="img-responsive" src="img/<?php echo $postImage; ?>" alt="">
            </a>

            <hr>
            <p> <?php echo $postContent; ?> </p>

            <a class="btn btn-primary" href="post.php?p_id=<?php echo $postId; ?>">Read More<span
                    class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            <?php
                }
            } ?>
        </div>
        <!-- DISPLAY BLOG POST -->

        <!-- Include Blog Sidebar Widgets Column -->
        <?php include 'includes/sidebar.php' ?>

    </div>
    <!-- /.row -->

    <?php include 'includes/footer.php' ?>