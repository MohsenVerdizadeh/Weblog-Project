<?php
require_once 'connect.php';
require_once 'security.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale="1">

    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
    <title>Admin</title>
</head>
<body>
    <h2 class="w3-container w3-teal w3-center">Admin Dashboard</h2>
    <div class="w3-container w3-center">
    <a href="index.php" class="w3-bar-item w3-button w3-pale-green">Home</a>
    <a href="sign_out.php" class="w3-bar-item w3-button w3-pale-red">Sign out</a>

        <p>Welcome <?php require_once 'connect.php'; echo User::searchUser($_SESSION['userEmail'])['fullName']; ?></p>
        <p><a href="add_weblog.php" class="w3-button w3-teal">Create new weblog</a></p>
        <p><h4>Your Weblogs</h4></p>
        <?php

        require_once'connect.php';
        User::listUserWeblogs($_SESSION['userEmail']);




?>

    </div>
</body>
</html>