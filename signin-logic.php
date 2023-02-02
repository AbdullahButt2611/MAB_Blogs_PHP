<?php

require 'config/database.php';

if(isset($_POST['submit'])){

    // GETTING FORM DATA
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email){
        $_SESSION['signin'] = "Username or Email is Required";
    }
    elseif(!$password)
    {
        $_SESSION['signin'] = "Password Required";
    }
    else
    {

        // FETCHING USER FROM DATABASE
        $fetch_user_query = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email' ";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if(mysqli_num_rows($fetch_user_result) == 1){

            // CONVERTING THE RECORD INTO ASSOCATIVE ARRAY
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];

            // COMAPRE FORM PASSWORD WITH DATABASE PASSWORD
            if(password_verify($password, $db_password)){

                // SETTING SESSION FOR ACCESS CONTROL
                $_SESSION['user-id'] = $user_record['id'];

                // SETTING SESSION IF USER IS AN ADMIN
                if($user_record['is_admin'] == 1){
                    $_SESSION['user_is_admin'] = true;
                }

                // LOGGING USER INTO THE SYSTEM
                header('location: ' . ROOT_URL . 'admin/');

            }
            else
            {
                $_SESSION['signin'] = "Invalid Credentials";
            }

        }
        else{
            $_SESSION['signin'] = "User not found";
        }

    }

    // IF ANY ERROR, REDIRECTING BACK TO SIGN IN PAGE WIRH LOGIN DETAILS
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }

}
else    // if button is not clicked
{
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}

?>