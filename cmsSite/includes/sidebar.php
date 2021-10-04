<div class="col-md-4">





    <!-- Login -->
    <div class="well">
        <h4>Login</h4>

        <!-- Start Of Login Form -->
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username" />
            </div>

            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Enter Password" />
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit</button>



                </span>
            </div>

        </form>
        <!-- End of Login Form -->


        <!-- /.input-group -->
    </div>

    <?php
    $query = "SELECT * FROM categories";
    $selectCategoriesSidebarQuery = mysqli_query($connection, $query);
    ?>





    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php

                    while ($row = mysqli_fetch_assoc($selectCategoriesSidebarQuery)) {
                        $catTitle = $row['cat_title'];
                        $catId = $row['cat_id'];

                        echo "<li><a href='category.php?category=$catId'>{$catTitle}</a></li>";
                    }
                    ?>


                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>

</div>