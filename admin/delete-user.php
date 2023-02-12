<?php

require 'config/database.php';

if(isset($_GET['id'])){

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    // FETCHING USER FROM DATABASE
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);


    // MAKING SURE WE GOT BACK ONLY ONE USER
    if(mysqli_num_rows($result) == 1)
    {
        $avatar_name = $user['avatar'];
        $avatar_path = "../images/" . $avatar_name;

        // DELETE IMAGE IF AVAILABLE
        if($avatar_path){
            unlink($avatar_path);
        }
    }


    // FOR LATER   
    // FETCH ALL THUMBNAILS OF USER'S POST AND DELETE THAT
    



    // DELETING THE USER FROM DATABASE
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connection, $delete_user_query);
    if(mysqli_errno($connection))
    {
        $_SESSION['delete-user'] = "Couldn't Delete '{$user['firstname']} {$user['lastname']}' Delete the User";
    }
    else
    {
        $_SESSION['delete-user-success'] = "'{$user['firstname']} {$user['lastname']}' Has Been Deleted";
    }

}

header("location: " . ROOT_URL . 'admin/manage-users.php');
die();

?>