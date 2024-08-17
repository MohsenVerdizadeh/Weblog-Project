<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Weblog</title>
</head>
    <body>
    <a href="/weblog_project" class="w3-bar-item w3-button w3-pale-green">Home</a>
    <a href="/weblog_project/admin.php" class="w3-bar-item w3-button w3-pale-green">Admin Panel</a>   
    <?php require_once 'connect.php'; echo searchUser($_SESSION['userEmail'])['fullName'] ; ?>

        <center>
            <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST" >
                Title: <input type="text" name="title"><br><br>
                Content: <textarea name="content"  rows="25" cols="80"></textarea><br><br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </center>
        
    </body>
</html>




<?php

            require_once'connect.php';
        
            if(isset($_POST['submit'])) {
                $new_weblog = new Weblog($_POST['title'],searchUser($_SESSION['userEmail'])['fullName'] ,$_SESSION['userEmail'], $_POST['content']);
                addWeblog($new_weblog);
                header("location: admin.php");
            }
