<?php

include 'partials/header.php';



// FETCHING POST FROM DATABASE IF ID IS SET
if(isset($_GET['id'])){

    $id= filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);



}else{
    header("location: " . ROOT_URL . "blog.php");
    die();
}


?>



<section class="singlepost">
    <div class="container singlepost__container">
        <h2><?= $post['title'] ?></h2>

        <div class="post__author">

            <?php
                
                // FETCHING AUTHOR FROM USER TABLE USING USER ID
                $simpleuser_id = $post['author_id'];
                $simpleuser_query = "SELECT * FROM users WHERE id=$simpleuser_id";
                $simpleuser_result = mysqli_query($connection, $simpleuser_query);
                $simpleuser = mysqli_fetch_assoc($simpleuser_result);
            
            ?>

            <div class="post__author-avatar">
                <img src="./images/<?= $simpleuser['avatar'] ?>" alt="">
            </div>

            <div class="post__author-info">
                <h5>By: &nbsp;<?= $simpleuser['firstname']. " " . $simpleuser['lastname']?></h5>
                <small><?= date("F j, Y, g:i a", strtotime($post['date_time'])); ?></small>
            </div>
        </div>

        <div class="singlepost__thumbnail">
            <img src="./images/<?= $post['thumbnail'] ?>">
        </div>

        <?php
        
            $str_parts = preg_split("/\r\n|\r|\n/", $post['body']);
        
        ?>


        <?php for($x = 0; $x < sizeof($str_parts); $x++) :?>

            <p>
                <?= $str_parts[$x] ?>
            </p>
        
        <?php endfor?>

    </div>
</section>
<!----------------------- SINGLE POST SECTION ENDS HERE ------------------------->



<?php

include 'partials/footer.php';

?>