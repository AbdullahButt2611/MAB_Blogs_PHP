<?php

require "config/database.php";


// GETTING SIGN UP FORM DATA IF SIGN UP BUTTON WAS CLICKED
if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // VALIDATING INPUT VALUES
    if(!$firstname){
        $_SESSION['signup'] = "Please enter your First Name";
    }
    elseif(!$lastname){
        $_SESSION['signup'] = "Please enter your Last Name";
    }
    elseif(!$username){
        $_SESSION['signup'] = "Please enter your Username";
    }
    elseif(!$email){
        $_SESSION['signup'] = "Please enter a Valid Email";
    }
    elseif( strlen($createpassword) < 8 || strlen($confirmpassword) < 8){
        $_SESSION['signup'] = "Password should be 8+ characters";
    }
    elseif(!$avatar['name']){
        $_SESSION['signup'] = "Please select your Profile Picture";
    }
    else{

        // CHECK IF PASSWORDS DON'T MATCH
        if( $createpassword !== $confirmpassword ){
            $_SESSION['signup'] = "Passwords don't match!";
        }
        else{
            
            // HASHING PASSWORD
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            
            // CHECK IF USERNAME OR EMAIL ALREADY EXIST IN DATABASE
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){        //IF WE GOT ANY RECORD
                $_SESSION['signup'] = "Username or Email already exists";
            }else{

                // WORKING ON AVATAR

            }

        }

    }
    var_dump($avatar);
}
else{
    // IF BUTTON WASN'T CLICKED,BOUNCE BACK TO SIGN UP PAGE
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}

?>