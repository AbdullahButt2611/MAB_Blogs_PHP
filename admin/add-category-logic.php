<?php

require 'config/database.php';

if(isset($_POST['submit'])){

    // GETTING FORM DATA
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if(!$title)
    {
        $_SESSION['add-category'] = "Please Enter Title of Category!";
    }
    elseif(!$description){
        $_SESSION['add-category'] = "Please Write a Small Description of Category!";
    }

    // REDIRECTING BACK TO ADDD CATEG0RY PAGE WITH FORM DATA IF THERE WAS INVALID INPUT 
    if(isset($_SESSION['add-category'])){
        $_SESSION['add-category-data'] = $_POST;
        header("location: " . ROOT_URL . "admin/add-category.php");
        die();
    }else{
        // INDERTING CATEGORY INTO DATABASE
        $query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($connection, $query);
        if(mysqli_errno($connection))
        {
            $_SESSION['add-category'] = "Couldn't Add Category";
            header("location: " . ROOT_URL . "admin/add-category.php");
            die();
        }
        else{
            $_SESSION['add-category-success'] = "Category '$title' Added Successfully";
            header("location: " . ROOT_URL . "admin/manage-categories.php");
            die();
        }
    }

}

?>