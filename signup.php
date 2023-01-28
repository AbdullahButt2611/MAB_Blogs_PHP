<?php

require "config/database.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAB Blogs</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- CDN FOR ICONSCOUT FOR INSERTIG ICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- LINK FOR THE FAV ICON -->
    <link rel="shortcut icon" href="images/fav.png" type="image/x-icon">

</head>
<body>

    <section class="form__section">
        <div class="container form__section-container">
            <h2>Sign Up</h2>

            <div class="alert__message error">
                <p>This is an error message</p>
            </div>

            <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" placeholder="First Name">
                <input type="text" name="lastname" placeholder="Last Name">
                <input type="text" name="username" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="createpassword" placeholder="Create Password">
                <input type="password" name="confirmpassword" placeholder="Confirm Password">
                <div class="form__control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Sign Up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>
   



    <!----------------------- LINKING JAVASCRIPT ------------------------->
    <script src="js/main.js"></script>


</body>
</html>