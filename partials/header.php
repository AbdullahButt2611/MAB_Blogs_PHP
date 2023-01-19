<?php

require 'config/constants.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAB Blogs</title>
    <link rel="stylesheet" href="./css/style.css">

    <!-- CDN FOR ICONSCOUT FOR INSERTIG ICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- LINK FOR THE FAV ICON -->
    <link rel="shortcut icon" href="images/fav.png" type="image/x-icon">

</head>
<body>
    <nav>
        <div class="container nav__container">
            <a href="index.php" class="nav__logo">MAB BLOGS</a>

            <ul class="nav__items">
                <li><a href="<?=  ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?=  ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?=  ROOT_URL ?>services.php">Services</a></li>
                <li><a href="<?=  ROOT_URL ?>contact.php">Contact</a></li>
                <!-- <li><a href="<#?=  ROOT_URL ?>signin.php">Sign In</a></li> -->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="images/avatar1.jpg">
                    </div>

                    <ul>
                        <li><a href="<?=  ROOT_URL ?>admin/dashboard.php">Dashboard</a></li>
                        <li><a href="<?=  ROOT_URL ?>logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>

            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!----------------------- NAV SECTION ENDS HERE ------------------------->





