<?php

include "partials/header.php";


// FETCHING CATEGORIES FROM DATABASE
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);



// FETCHING POST DATA FROM DATABASE IF ID IS SET OR THE FORM IS SUBMITTED
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);   
}else{
    header("location: " . ROOT_URL . "admin/");
    die();
}



?>





<section class="form__section">
    <div class="alert__message success">
        <b><p>Please Choose The Category Again</p></b>
    </div>
    <div class="container form__section-container">

        <div class="flex-space-between">
            <h2>Edit Post</h2>
            <input type="text" disabled value="<?= date("F j, Y, g:i a", strtotime($post['date_time'])) ?>">
        </div>


        <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
            
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">

            <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title">
            
            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id']?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
            </select>
            
            <textarea rows="10" name="body"  placeholder="Body"><?= $post['body'] ?></textarea>

            <div class="form__control inline">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" checked>
                <label for="is_featured" >Featured</label>
            </div>
            
            <div class="form__control">
                <label for="thumbnail" >Change Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            
            <button type="submit" name="submit" class="btn">Update Post</button>

        </form>
    </div>
</section>
<!----------------------- FORM SECTION ENDS HERE ------------------------->





   

   
<?php

include "../partials/footer.php";

?>