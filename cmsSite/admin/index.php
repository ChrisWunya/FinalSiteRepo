<!-- Header -->
<?php include "includes/adminHeader.php" ?>
<!-- Include Navigation -->
<?php include "includes/adminNavigation.php" ?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To The Admin Control Center<br />
                        <h3>Here we have some sums of information.
                            <small><?php echo $_SESSION['userName']; ?></small>
                    </h1>
                </div>
            </div>
            <!-- Page Heading -->
            <!-- /.row -->

            <!-- /.row -->
            <!-- DISPLAY POSTS -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <!-- DISPLAY POSTS -->

                                    <!-- POSTS QUERY -->
                                    <?php
                                    $query = "SELECT * FROM posts";
                                    $selectAllPosts = mysqli_query($connection, $query);
                                    $postCount = mysqli_num_rows($selectAllPosts);
                                    echo "<div class='huge'>{$postCount}</div>"
                                    ?>
                                    <!-- POSTS QUERY -->

                                    <!-- DISPLAY POSTS -->
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- DISPLAY POSTS -->

                <!-- DISPLAY COMMENTS -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <!-- DISPLAY COMMENTS -->

                                    <!-- COMMENTS QUERY -->
                                    <?php
                                    $query = "SELECT * FROM comments";
                                    $selectAllComments = mysqli_query($connection, $query);
                                    $commentCount = mysqli_num_rows($selectAllComments);
                                    echo "<div class='huge'>{$commentCount}</div>"
                                    ?>
                                    <!-- COMMENTS QUERY -->

                                    <!-- DISPLAY COMMENTS -->
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- DISPLAY COMMENTS -->

                <!-- DISPLAY USERS -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <!-- DISPLAY USERS -->

                                    <!-- USERS QUERY -->
                                    <?php
                                    $query = "SELECT * FROM users";
                                    $selectAllUsers = mysqli_query($connection, $query);
                                    $userCount = mysqli_num_rows($selectAllUsers);
                                    echo "<div class='huge'>{$userCount}</div>"
                                    ?>
                                    <!-- USERS QUERY -->

                                    <!-- DISPLAY USERS -->
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <!-- DISPLAY USERS -->

                                    <!-- CATEGORIESQUERY -->
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $selectAllCategories = mysqli_query($connection, $query);
                                    $categoryCount = mysqli_num_rows($selectAllCategories);
                                    echo "<div class='huge'>{$categoryCount}</div>"
                                    ?>
                                    <!-- CATEGORIESQUERY -->

                                    <!-- DISPLAY CATEGORIES -->
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- DISPLAY CATEGORIES -->
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <!-- Include Footer -->
    <?php include "includes/adminFooter.php" ?>