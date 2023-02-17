<?php

include "partials/header.php";


// FETCHING CURRENT USER'S POST FROM DATABASE
$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id, date_time FROM posts WHERE author_id = $current_user_id ORDER BY id DESC";
$posts =mysqli_query($connection, $query);

?>


    

<section class="dashboard">

    <?php if(isset($_SESSION['add-post-success'])) :  // SHOWS IF ADD POST OPERATION WAS ACTIVATED ?>
    
        <div class="alert__message success container">
            <b><p class="text-center"><?= 
                $_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']);
            ?></p></b>
        </div>

    <?php elseif(isset($_SESSION['edit-post'])) :  // SHOWS IF EDIT POST OPERATION WAS NOT ACTIVATED ?>
    
        <div class="alert__message error container">
            <b><p class="text-center"><?= 
                $_SESSION['edit-post'];
                unset($_SESSION['edit-post']);
            ?></p></b>
        </div>

    <?php elseif(isset($_SESSION['edit-post-success'])) :  // SHOWS IF EDIT POST OPERATION WAS ACTIVATED ?>
    
        <div class="alert__message success container">
            <b><p class="text-center"><?= 
                $_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']);
            ?></p></b>
        </div>

    <?php elseif(isset($_SESSION['delete-post-success'])) :  // SHOWS IF DELETE POST OPERATION WAS ACTIVATED ?>
    
        <div class="alert__message success container">
            <b><p class="text-center"><?= 
                $_SESSION['delete-post-success'];
                unset($_SESSION['delete-post-success']);
            ?></p></b>
        </div>

    <?php endif ?>


    <div class="container dashboard__container">
        <button id="show__Sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__Sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>

        <aside>
            <ul>
                
                <li>
                    <a href="add-post.php">
                        <i class="uil uil-pen"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>

                <li>
                    <a href="index.php" class="active">
                        <i class="uil uil-postcard"></i>
                        <h5>Manage Post</h5>
                    </a>
                </li>

                <?php if(isset($_SESSION['user_is_admin'])) :  ?>

                <li>
                    <a href="add-user.php">
                        <i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a>
                </li>

                <li>
                    <a href="manage-users.php">
                        <i class="uil uil-users-alt"></i>
                        <h5>Manage Users</h5>
                    </a>
                </li>

                <li>
                    <a href="add-category.php">
                        <i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a>
                </li>

                <li>
                    <a href="manage-categories.php">
                        <i class="uil uil-list-ul"></i>
                        <h5>Manage Categories</h5>
                    </a>
                </li>

                <?php endif ?>

            </ul>
        </aside>
        <!----------------------- ASIDE MENU ENDS HERE ------------------------->
        
        <main>
            <h2>Manage Posts</h2>

            <?php if(mysqli_num_rows($posts) > 0) : ?>

            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date Time</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($post = mysqli_fetch_assoc($posts)) : ?>

                        <!-- GETTING CATEGORY TITLE OF EACH POST FROM CATEGORIES TABLE -->
                        <?php
                        
                            $category_id = $post['category_id'];
                            $category_query = "SELECT title FROM categories WHERE id = $category_id ";
                            $category_result =mysqli_query($connection, $category_query);
                            $category = mysqli_fetch_assoc($category_result);
                        
                        ?>

                        <tr>
                            <td><?= $post['title'] ?></td>
                            <td><?= $category['title'] ?></td>
                            <td><?= date("F j, Y, g:i a", strtotime($post['date_time'])) ?></td>
                            <td><a href="<?= ROOT_URL?>admin/edit-post.php?id=<?=$post['id']?>" class="btn sm">Edit</a></td>
                            <td><a href="<?= ROOT_URL?>admin/delete-post.php?id=<?=$post['id']?>" class="btn sm danger">Delete</a></td>
                        </tr>
                    
                    <?php endwhile ?>

                </tbody>
            </table>

            <?php else : ?>

                <div class="alert__message error  ">
                    <b><p class="text-center">You Have Not Posted Anything Yet</p></b>
                </div>

            <?php endif ?>

        </main>

    </div>
</section>
<!----------------------- Dashboard SECTION ENDS HERE ------------------------->






<?php

include "../partials/footer.php";

?>