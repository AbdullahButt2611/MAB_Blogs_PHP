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

            <div class="alert__message success">
                <p>This is an error message</p>
            </div>

            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
                <input type="text" placeholder="Username">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Create Password">
                <input type="password" placeholder="Confirm Password">
                <div class="form__control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" id="avatar">
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <small>Already have an account? <a href="signin.php">Sign In</a></small>
            </form>
        </div>
    </section>
   



    <!----------------------- LINKING JAVASCRIPT ------------------------->
    <script src="js/main.js"></script>


</body>
</html>