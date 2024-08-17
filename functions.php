<?php



//function addWeblog($weblog)
//{
//    $author_information = User::searchUser($weblog->getAuthorEmail());
//    $author_weblogs = $author_information['weblogs'];
//    $author_weblogs[$weblog->id] = $weblog;
//    $new_user = new User($author_information['fullName'], $author_information['email'], $author_information['password']);
//    $new_user->weblogs = $author_weblogs;
//    User::addUser($new_user);
//
//    $weblogs = json_decode(file_get_contents('database/weblogs.txt'),true);
//    //  echo var_dump($weblogs)."<br>";
//    //  echo var_dump($weblog);
//    $weblogs[$weblog->id] = $weblog;
//    file_put_contents('database/weblogs.txt', json_encode($weblogs));
//
//}

//function listUserWeblogs($userEmail)
//{
//    $userWeblogs = User::searchUser($userEmail)['weblogs'];
//    if (count($userWeblogs) == 0) {
//        echo'you dont have any weblogs'."<br>";
//
//    } else {
//        foreach ($userWeblogs as $id => $weblog) {
//            echo "<a href='/weblog_project/show_weblog.php?id=".$id."'>".$weblog['title'] . "</a>"."<br>";
//        }
//    }
//
//}

//function listWeblogs()
//{
//    $weblogs=json_decode(file_get_contents("database/weblogs.txt"),true);
//    if (count($weblogs) == 0) {
//        echo'we dont have any weblogs'."<br>";
//
//    } else {
//        foreach ($weblogs as $id => $weblog) {
//            echo "<a href='/weblog_project/show_weblog.php?id=".$id."'>".$weblog['title']."--->".$weblog['author']. "</a>"."<br>";
//        }
//    }
//
//}

//function removeWeblog($userEmail, $id)
//{
//    $authorInformation= User::searchUser($userEmail);
//    $user_weblogs = $authorInformation["weblogs"];
//    // delete weblog
//    unset($user_weblogs[$id]);
//    //create new user with edited information
//    $new_user = new User($authorInformation["fullName"], $authorInformation["email"], $authorInformation["password"]);
//    $new_user->weblogs = $user_weblogs;
//    // write in database
//    User::addUser($new_user);
//
//    $weblogs=json_decode(file_get_contents("database/weblogs.txt"), true);
//    unset($weblogs[$id]);
//    file_put_contents("database/weblogs.txt", json_encode($weblogs));
//
//    header("location: admin.php");
//
//}
//function searchWeblog($id)
//{
//    $weblogs = json_decode(file_get_contents("database/weblogs.txt"), true);
//    return $weblogs[$id];
//}
