<?php

require 'config/constants.php';

// DESTROY ALL SESSIONS AND REDIRECT USER TO HOME PAGE
session_destroy();
header('location: ' . ROOT_URL);
die();

?>