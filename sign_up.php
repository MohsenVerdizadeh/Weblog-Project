
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
</head>
<body>
<a href="/weblog_project" class="w3-bar-item w3-button w3-pale-green">Home</a>
<a href="/weblog_project/sign_in.php" class="w3-bar-item w3-button w3-pale-green">Sign IN</a>

    <center>
        <h2>Sign UP</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            Fullname: <input type="text" name="fullname"><br><br>
            E_mail: <input type="text" name="email"><br><br>
            Password: <input type="text" name="password"><br><br>
            <input type="submit" name="signUp" value="Sign Up">

        </form>
    </center>
</body>
</html>

<?php

        require_once'connect.php';
        

        if(isset($_POST['signUp'])) {
            if(searchUser($_POST['email']) == null) {
                $new_user = new User($_POST['fullname'], $_POST['email'],password_hash( $_POST['password'],PASSWORD_DEFAULT));
                addUser($new_user);
                $_SESSION['userEmail'] = $new_user->getEmail();
                header("location: admin.php");
            } else {
                echo'user is already exist!!';
            }
        }

        ?>