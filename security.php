<?php
if (!isset($_SESSION['userEmail'])) {
    header("location: sign_in.php");
    exit();
}