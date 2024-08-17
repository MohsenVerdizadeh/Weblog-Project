
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
<a href="index.php" class="w3-bar-item w3-button w3-pale-green">Home</a>
<a href="sign_up.php" class="w3-bar-item w3-button w3-pale-green">Sign UP</a>


    <center>
        <h2>Sign In</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            Email: <input type="text" name="email"><br><br>
            Password: <input type="text" name="password"><br><br>
            <input type="submit" name="signIn" value="Sign In">

        </form>
    </center>
</body>
</html>

<?php
        require_once'connect.php';



        if(isset($_POST["signIn"])) {

            $user_information = User::searchUser($_POST['email']);

            if($user_information != null) {
                if(password_verify($_POST['password'],$user_information['password'])) {
                    $_SESSION['userEmail'] = $_POST['email'];
                    header("location: admin.php");
                } else {
                    echo 'password is incorrect!!'."<br>";
                }
            } else {
                echo 'user doesnt exist!!'."<br>";
            }
        }
        ?>