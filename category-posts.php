<?php

include 'partials/header.php';


// FETCHING POST FROM DATABASE IF ID IS SET
if(isset($_GET['id'])){

    $id= filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);



}else{
    header("location: " . ROOT_URL . "blog.php");
    die();
}



?>


<header class="category__title">

    <?php
                
        // FECTHING CATEGORY FROM CATEGORIES TABLE USING CATEGORY ID OF POST
        $simplecategory_query = "SELECT * FROM categories WHERE id=$id";
        $simplecategory_result = mysqli_query($connection, $simplecategory_query);
        $simplecategory = mysqli_fetch_assoc($simplecategory_result);
    
    ?>

    <h2><?= $simplecategory['title']  ?></h2>
</header>
<!----------------------- CATEGORY TITLE HEADER ENDS HERE ------------------------->




<?php if(mysqli_num_rows($posts) > 0) : ?>
    <section class="posts">
        <div class="container posts__container">

            <?php while($post = mysqli_fetch_assoc($posts)) : ?>

                <article class="post">

                    <div class="post__thumbnail">
                        <img src="./images/<?= $post['thumbnail']?>">
                    </div>

                    <div class="post__info">

                        <h3 class="post__title">
                            <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                        </h3>

                        <p class="post__body">
                            <?= substr($post['body'], 0, 150) . "..."; ?>
                        </p>

                        <div class="post__author">

                            <?php
                            
                                // FETCHING AUTHOR FROM USER TABLE USING USER ID
                                $simpleuser_id = $post['author_id'];
                                $simpleuser_query = "SELECT * FROM users WHERE id=$simpleuser_id";
                                $simpleuser_result = mysqli_query($connection, $simpleuser_query);
                                $simpleuser = mysqli_fetch_assoc($simpleuser_result);
                            
                            ?>

                            <div class="post__author-avatar">
                                <img src="./images/<?= $simpleuser['avatar']?>">
                            </div>

                            <div class="post__author-info">
                                <h5>By: &nbsp;<?= $simpleuser['firstname']. " " . $simpleuser['lastname']?></h5>
                                <small><?= date("F j, Y, g:i a", strtotime($post['date_time'])); ?></small>
                            </div>

                        </div>

                    </div>

                </article>

            <?php endwhile?>

        </div>
    </section>

<?php else : ?>

    <div class="alert__message error">
        <b>
            <p class="text-center">No Post Found For '<?= $simplecategory['title']?>' Category</p>
        </b>
    </div>

<?php endif?>
<!----------------------- Posts SECTION ENDS HERE ------------------------->




<?php
                
    // FECTHING CATEGORY FROM CATEGORIES TABLE USING CATEGORY ID OF POST
    $allcategory_query = "SELECT * FROM categories";
    $allcategory_result = mysqli_query($connection, $allcategory_query);

?>

<section class="category__buttons">
    <div class="container category__buttons-container">

            <?php while($allcategories = mysqli_fetch_assoc($allcategory_result)) : ?>
            
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $allcategories['id'] ?>" class="category__button">
                    <?= $allcategories['title'] ?>
                </a>
            
            <?php endwhile?>

    </div>
</section>
<!----------------------- Category Buttons SECTION ENDS HERE ------------------------->



<?php

include 'partials/footer.php';

?>    