<?php


require 'partials/header.php';


if(isset($_GET['submit']) && isset($_GET['search'])){

    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROm posts WHERE title LIKE '%$search%' ORDER BY date_time DESC ";
    $posts = mysqli_query($connection, $query); 

}
else{
    header("location: " . ROOT_URL . "blog.php");
}

?>



<section class="search__bar">
    <form class="container search__bar-container" action="<?= ROOT_URL?>search.php" method="GET">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" name="search" placeholder="Search">
        </div>

        <button type="submit" name="submit" class="btn">Go</button>
    </form>
</section>
<!----------------------- SEARCH SECTION ENDS HERE ------------------------->


<?php if(mysqli_num_rows($posts) > 0) : ?>
<section class="posts section__extra-margin ">
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

<?php else : ?>

    <div class="alert__message error section__extra-margin lg">
        <b>
            <p class="text-center ">No Post Found For '<?= $search?>'</p>
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