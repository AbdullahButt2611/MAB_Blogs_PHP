<?php


require 'config/database.php';


if(isset($_GET['id']))
{

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


    // FOR LATER
    // UPDATE CATEGORY_ID OF POST THAT BELONG TO THIS CATEGORY TO ID OF UNCATEGORIZED CATEGORY






    // DELETING CATEGORY FROM DATABASE
    $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);
    $_SESSION['delete-category-success'] = "Category Deleted Successfully!";
    
}

header("location: " . ROOT_URL . "admin/manage-categories.php");


?>