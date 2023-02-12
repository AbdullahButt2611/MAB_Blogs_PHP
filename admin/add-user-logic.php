<?php

require "config/database.php";


// GETTING FORM DATA IF SUBMIT BUTTON WAS CLICKED
if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // VALIDATING INPUT VALUES
    if(!$firstname){
        $_SESSION['add-user'] = "Please enter your First Name";
    }
    elseif(!$lastname){
        $_SESSION['add-user'] = "Please enter your Last Name";
    }
    elseif(!$username){
        $_SESSION['add-user'] = "Please enter your Username";
    }
    elseif(!$email){
        $_SESSION['add-user'] = "Please enter a Valid Email";
    }
    elseif( strlen($createpassword) < 8 || strlen($confirmpassword) < 8){
        $_SESSION['add-user'] = "Password should be 8+ characters";
    }
    elseif(!$avatar['name']){
        $_SESSION['add-user'] = "Please select your Profile Picture";
    }
    else{

        // CHECK IF PASSWORDS DON'T MATCH
        if( $createpassword !== $confirmpassword ){
            $_SESSION['add-user'] = "Passwords don't match!";
        }
        else{
            
            // HASHING PASSWORD
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            
            // CHECK IF USERNAME OR EMAIL ALREADY EXIST IN DATABASE
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){        //IF WE GOT ANY RECORD
                $_SESSION['add-user'] = "Username or Email already exists";
            }else{

                // WORKING ON AVATAR
                // RENAMING AVATAR
                $time = time();                 // make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;


                // MAKING SURE FILE IS AN IMAGE
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
                if(in_array($extension, $allowed_files)){

                    // MAKE SURE IMAGE IS NOT TOO LARGE (1MB+)
                    if($avatar['size'] < 1000000){

                        // UPLOADING AVATAR
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);

                    }
                    else
                    {
                        $_SESSION['add-user'] = "File size too big. Should be less than 1mb";
                    }

                }
                else
                {
                    $_SESSION['add-user'] = "File should be png, jpg or jpeg";
                }

            }

        }

    }

    // REDIRECTING BACK TO SIGN UP PAGE IF THERE WAS ANY PROBLEM
    if(isset($_SESSION['add-user']))
    {

        // PASSING THE FORM DATA BACK TO SIGN UP PAGE
        $_SESSION['add-user-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-user.php');
        die();

    }else{

        // INSERT NEW USER INTO USER'S TABLE
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', $is_admin)";
        $insert_user_result = mysqli_query($connection, $insert_user_query);


        if(!mysqli_errno($connection)){                     // if everything went well

            // REDIRECTING TO LOGIN PAGE WITH SUCCESS MESSAGE
            $_SESSION['add-user-success'] = "New User '$firstname $lastname' added.";
            header('location: ' . ROOT_URL . 'admin/manage-users.php');
            die();

        }

    }
    
}
else{
    // IF BUTTON WASN'T CLICKED,BOUNCE BACK TO SIGN UP PAGE
    header('location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}

?>