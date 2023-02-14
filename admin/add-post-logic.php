<?php


require 'config/database.php';



if(isset($_POST['submit'])){
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    if(isset($_POST['is_featured'])){
        $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    }
    else{
        $is_featured = null;
    }
    
    $thumbnail = $_FILES['thumbnail'];


    // SETTING IS_FEATURED TO 0 IF IS NOT CHECKED
    $is_featured = $is_featured == 1 ? : 0;


    // VALIDATING FORM DATA
    if(!$body)
    {
        $_SESSION['add-post'] = "Content is Required For The Post";
    }
    elseif(!$title)
    {
        $_SESSION['add-post'] = "Title is Required For The Post";
    }
    elseif(!$category_id)
    {
        $_SESSION['add-post'] = "Select a Category For The Post";
    }
    elseif(!$thumbnail['name'])
    {
        $_SESSION['add-post'] = "Please Choose A Thumbnail For Post";
    }
    else{

        // WORKING ON THUMBNAIL
        // RENAMING THE THUMBNAIL
        $time = time();                             //Make each image name unique
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = "../images/" . $thumbnail_name;


        // LET'S MAKE SURE FILE IS REALLY AN IMAGE
        $allowed_files = ["jpg", "png", "jpeg"];
        $extension = explode('.', $thumbnail_name );
        $extension = end($extension);
        if(in_array($extension, $allowed_files)){

            // MAKING SURE IMAGE IS NOT TOO LARGE (NOT MORE THAN 2MB)
            if($thumbnail['size']< 2_000_000){

                // UPLOADING THUMBNAIL
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);

            }else{
                $_SESSION['add-post'] = "File Size Is Too Big. Should Be Less Than 2MB";
            }

        }
        else{
            $_SESSION['add-post'] = "File Should Be 'png', 'jpg' or 'jpeg' Only";
        }

    }
    

    // REDIRECTING BACK (WITH FORM DATA) TO ADD-POST-PAGE IF THERE IS ANY ERROR 
    if(isset($_SESSION['add-post'])){
        $_SESSION['add-post-data'] = $_POST;
        header("location: " . ROOT_URL . "admin/add-post.php");
        die();
    }
    else{

        // SETTING IS FEATURED FOR ALL THE OTHER POSTS TO 0 IS ITS 1 FOR THIS POST
        if($is_featured == 1) {

            $zero_all_is_featured_query = "UPDATE posts SET is_featured = 0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);

        } 


        // INSERTING POST INTO THE DATABASE
        $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) VALUES ('$title', '$body', '$thumbnail_name', $category_id, $author_id, $is_featured)";
        $result = mysqli_query($connection, $query);
        

        if(!mysqli_errno($connection)){
            $_SESSION['add-post-success'] = "New Post Added Successfully";
            header("location: " . ROOT_URL . "admin/");
            die();
        }

    }

    header("location: " . ROOT_URL . "admin/add-post.php");
    die();
}


?>