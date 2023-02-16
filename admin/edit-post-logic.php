<?php

require 'config/database.php';


// MAKING SURE EDI POST BUTTON WAS CLICKED
if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'],
    FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // set is_featured to @ if it was unchecked '
    $is_featured = $is_featured == 1 ?: 0;
    
    // check and validate input values
    if (!$title) {
        $_SESSION[ 'edit-post'] = "Title of Post Is Required.";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] = "You Need To Choose A Category For This Post.";
    }
    elseif (!$body) {
        $_SESSTON['edit-post'] = "Content Of The Post Is Required";
    } 
    else {

        // DELETING EXISTING THUMBNAIL IF NEW THUMBNAIL IS AVAILABLE    
        if($thumbnail['name']){

            $previous_thumbnail_path = "../images/" . $previous_thumbnail_name;
            if($previous_thumbnail_path){
                unlink($previous_thumbnail_path);
            }

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
                    $_SESSION['edit-post'] = "File Size Is Too Big. Should Be Less Than 2MB";
                }

            }
            else{
                $_SESSION['edit-post'] = "File Should Be 'png', 'jpg' or 'jpeg' Only";
            }


        }

    }


    // REDIRECTING BACK TO MANAGE POSTS IF THERE IS ANY ERROR 
    if(isset($_SESSION['edit-post'])){
        header("location: " . ROOT_URL . "admin/");
        die();
    }
    else{

        // SETTING IS FEATURED FOR ALL THE OTHER POSTS TO 0 IS ITS 1 FOR THIS POST
        if($is_featured == 1) {

            $zero_all_is_featured_query = "UPDATE posts SET is_featured = 0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);

        } 


        // SETTING THUMNAIL NAME IF ONE WAS UPLOADED ELSE EEPING THE OLD ONE
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name; 


        // INSERTING POST INTO THE DATABASE
        $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        

        if(!mysqli_errno($connection)){
            $_SESSION['edit-post-success'] = "Post Updated Successfully";
           
        }

    }

}

header("location: " . ROOT_URL . "admin/");
die();


?>