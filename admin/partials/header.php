<?php

require '../partials/header.php';


// FETCING CURRRENT USER FROM DATABASE
if(!isset($_SESSION['user-id'])){

    header("location: " . ROOT_URL . "signin.php");
    die();
    
}

?>
