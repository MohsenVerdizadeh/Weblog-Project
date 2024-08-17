<?php

// include("class/user.php");
// $user = new User('ali','alavi',1256478);
// $users =[$user->getUsername() => $user];

// file_put_contents('database/users.txt', json_encode($users));
// //fwrite($usres_file, json_encode($users));

// echo readfile('database/users.txt');
// include("class/weblog.php");
// $weblog = new Weblog('AI', 'ali', 'sadasdasdas\r\nasdasdads\r\nasdasdasd\r\nasdasdad\r\n');
// $weblogs = array($weblog);
// file_put_contents('database/weblogs.txt', json_encode($weblogs));
// $array = ["ali"=>25,"reza"=>28];
// unset($array["ali"]);
// print_r($array);
// $name = "asdasdasd\r\nasdasd\r\nsdasd\r\nsad\r\nas\r\nd\r\nasd\r\nasd\r\nasd\r\na\r\nsd";
// echo str_replace("\r\n","<br>", $name);
$password ='123456';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo password_verify('12345', $hash);