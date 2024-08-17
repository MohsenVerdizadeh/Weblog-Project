<?php
require_once('connect.php');
$weblog = searchWeblog($_GET['id']);
$_SESSION['weblog'] = $weblog;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" ,initial-scale="1">

    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.19.1/ui/trumbowyg.min.css">
    <title><?php require_once 'connect.php'; echo $_SESSION['weblog']['title']; ?></title>
</head>
<body>
    <h2 class="w3-container w3-teal w3-center"><?php require_once('connect.php');
echo $_SESSION['weblog']['title']."<br>"."Author: ".searchUser( $_SESSION['weblog']['authorEmail'])['fullName'] ?></h2>
    <?php
require_once('connect.php');
echo "<a href='"."/weblog_project/" ."' class='w3-bar-item w3-button w3-pale-green' >Home</a>";

if(isset($_SESSION['userEmail'])){
    if($_SESSION['userEmail'] == $_SESSION['weblog']['authorEmail']) {
        echo "<a href='"."/weblog_project/" ."edit_weblog.php' class='w3-bar-item w3-btn w3-pale-yellow'>Edit</a>";
        echo "<a href='"."/weblog_project/" ."remove_weblog.php' class='w3-bar-item w3-btn w3-pale-red'>Remove</a>";

    }
}else{
    echo "<a href='"."/weblog_project/" ."sign_in.php' class='w3-bar-item w3-button w3-pale-red' >Sign IN</a>";
    echo "<a href='"."/weblog_project/" ."sign_up.php' class='w3-bar-item w3-button w3-pale-yellow' >Sign UP</a>";

}
?>
    <p >
        <?php
            require_once('connect.php');
            echo nl2br($_SESSION['weblog']['content']);
            
?>
    </p>


    

    </div>
</body>
</html>