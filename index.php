<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale="1">
    <title>PHP Blog</title>

    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
</head>
<body>

<header class="w3-container w3-teal">
    <h1>PHP Blog</h1>
</header>

<div class="w3-bar w3-border">
    <?php
    require_once('connect.php');
    
    if (isset($_SESSION['userEmail'])) {
        //echo "<a href='"."/weblog_project/" ."new_weblog.php' class='w3-bar-item w3-btn'>New Post</a>";
        echo "<a href='"."/weblog_project/" ."admin.php' class='w3-bar-item w3-btn w3-pale-red'>Admin Panel</a>";
        echo "<a href='"."/weblog_project/" ."sign_out.php' class='w3-bar-item w3-btn w3-pale-green'>Sign Out</a>";
        echo searchUser($_SESSION['userEmail'])['fullName'] ;
    } else {
        // echo "<a href='"."/weblog_project/" ."index.php' class='w3-bar-item w3-btn'>Home</a>";
        echo "<a href='"."/weblog_project/" ."sign_in.php' class='w3-bar-item w3-button w3-pale-red' >Sign IN</a>";
        echo "<a href='"."/weblog_project/" ."sign_up.php' class='w3-bar-item w3-button w3-pale-yellow' >Sign UP</a>";

    }
    ?>
</div>

<p align="center">
        <?php
         echo "<br>";
         listWeblogs() ;
        ?>
    </p>
</body>