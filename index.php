<?php

include 'partials/header.php';


// FECTHING FEATURED POST FROM DATABASE
$featured_query = "SELECT * FROM posts WHERE is_featured = 1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);


// FETCHING 9 POST FROM POSTS TABLE IN THE DATABASE
$query = "SELECT * FROM posts WHERE is_featured<>1 ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);

?>


<!-- SHOWING FEATURED POST IF ANY HERE -->
<?php if(mysqli_num_rows($featured_result) == 1) : ?>

    <section class="featured">

        <div class="container featured__container">
            <div class="post__thumbnail">
                <img src="./images/<?= $featured['thumbnail'] ?>">
            </div>

            <?php
            
                // FECTHING CATEGORY FROM CATEGORIES TABLE USING CATEGORY ID OF POST
                $category_id = $featured['category_id'];
                $category_query = "SELECT * FROM categories WHERE id=$category_id";
                $category_result = mysqli_query($connection, $category_query);
                $category = mysqli_fetch_assoc($category_result);
                $category_title = $category['title'];
            
            ?>

            <div class="post__info">
                <a href="<?= ROOT_URL?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category_title ?></a>

                <h2 class="post__title"><a href="<?= ROOT_URL?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>

                <p class="post__body">
                    <?= substr($featured['body'], 0, 300) . "..."; ?>
                </p>

                <div class="post__author">

                    <?php
                    
                        // FETCHING AUTHOR FROM USER TABLE USING USER ID
                        $user_id = $featured['author_id'];
                        $user_query = "SELECT * FROM users WHERE id=$user_id";
                        $user_result = mysqli_query($connection, $user_query);
                        $user = mysqli_fetch_assoc($user_result);
                    
                    ?>

                    <div class="post__author-avatar">
                        <img src="./images/<?= $user['avatar'] ?>" alt="">
                    </div>

                    <div class="post__author-info">
                        <h5>By: &nbsp;<?= $user['firstname']. " " . $user['lastname']?></h5>
                        <small><?= date("F j, Y, g:i a", strtotime($featured['date_time'])); ?></small>
                    </div>
                </div>

            </div>
        </div>

    </section>

<?php endif ?>

<!----------------------- Featured SECTION ENDS HERE ------------------------->






<section class="posts">
    <div class="container posts__container">

        <?php while($post = mysqli_fetch_assoc($posts)) : ?>

            <article class="post">

                <div class="post__thumbnail">
                    <img src="./images/<?= $post['thumbnail']?>">
                </div>

                <div class="post__info">

                    <?php
                
                        // FECTHING CATEGORY FROM CATEGORIES TABLE USING CATEGORY ID OF POST
                        $simplecategory_id = $post['category_id'];
                        $simplecategory_query = "SELECT * FROM categories WHERE id=$simplecategory_id";
                        $simplecategory_result = mysqli_query($connection, $simplecategory_query);
                        $simplecategory = mysqli_fetch_assoc($simplecategory_result);
                    
                    ?>
                    
                    <a href="<?= ROOT_URL?>category-posts.php?id=<?= $simplecategory['id'] ?>" class="category__button"><?= $simplecategory['title'] ?></a>

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


