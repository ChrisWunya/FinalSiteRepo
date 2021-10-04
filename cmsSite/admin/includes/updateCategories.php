<!-- Output Buffering -->
<?php ob_start(); ?>

<!--  Edit a category form -->
<form action="" method="POST">
    <div class="form-group">
        <label for="cat_Title">Edit Category</label>

        <!-- Edit category query -->
        <?php
        if (isset($_GET['edit'])) {
            // Store the value in a variable
            $cat_id = $_GET["edit"];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
            $selectCategoriesIdQuery = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($selectCategoriesIdQuery)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];
            }
        ?>

        <input value="<?php if (isset($catTitle)) {
                                echo $catTitle;
                            } ?>" class="form-control" type="text" name="catTitle">
        <?php } ?>

        <!-- Update category query -->
        <?php
        if (isset($_POST['updateCategory'])) {
            $theCatTitle = $_POST['catTitle'];
            $query = "UPDATE categories SET cat_title = '{$theCatTitle}' WHERE cat_id = {$cat_id}";
            $updateQuery = mysqli_query($connection, $query);
        }
        ?>


    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="updateCategory" value="Update">
    </div>
</form>