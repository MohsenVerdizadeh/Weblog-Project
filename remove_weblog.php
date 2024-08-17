<?php 
    require_once('connect.php');
    Weblog::removeWeblog($_SESSION['userEmail'], $_SESSION['weblog']['id']);
    header('location: admin.php');

    
