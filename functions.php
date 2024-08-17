<?php

// this function get username and get array of user infromation but if user doesnt exist then it give null
function searchUser($userEmail)
{
    $users = json_decode(file_get_contents('database/users.txt'), true);

    if(array_key_exists($userEmail, $users)) {
        return $users[$userEmail];
    } else {
        return null;
    }

}

function addUser($user) 
{
    $users = json_decode(file_get_contents('database/users.txt'), true);
    $users[$user->getEmail()] = $user;
    file_put_contents('database/users.txt', json_encode($users));
}


function addWeblog($weblog)
{
    $author_information = searchUser($weblog->getAuthorEmail());
    $autor_weblogs = $author_information['weblogs'];
    $autor_weblogs[$weblog->id] = $weblog;
    $new_user = new User($author_information['fullname'], $author_information['email'], $author_information['password']);
    $new_user->weblogs = $autor_weblogs;
    addUser($new_user);

    $weblogs = json_decode(file_get_contents('database/weblogs.txt'),true);
    //  echo var_dump($weblogs)."<br>";
    //  echo var_dump($weblog);
    $weblogs[$weblog->id] = $weblog;
    file_put_contents('database/weblogs.txt', json_encode($weblogs));

}

function listUserWeblogs($userEmail)
{
    $userWeblogs = searchUser($userEmail)['weblogs'];
    if (count($userWeblogs) == 0) {
        echo'you dont have any weblogs'."<br>";

    } else {
        foreach ($userWeblogs as $id => $weblog) {
            echo "<a href='/weblog_project/show_weblog.php?id=".$id."'>".$weblog['title'] . "</a>"."<br>";
        }
    }

}

function listWeblogs()
{
    $weblogs=json_decode(file_get_contents("database/weblogs.txt"),true);
    if (count($weblogs) == 0) {
        echo'we dont have any weblogs'."<br>";

    } else {
        foreach ($weblogs as $id => $weblog) {
            echo "<a href='/weblog_project/show_weblog.php?id=".$id."'>".$weblog['title']."--->".$weblog['author']. "</a>"."<br>";
        }
    }

}

function removeWeblog($userEmail, $id)
{
    $authorInformation= searchUser($userEmail);
    $user_weblogs = $authorInformation["weblogs"];
    // delete weblog
    unset($user_weblogs[$id]);
    //create new user with edited information
    $new_user = new User($authorInformation["fullname"], $authorInformation["email"], $authorInformation["password"]);
    $new_user->weblogs = $user_weblogs;
    // write in database
    addUser($new_user);

    $weblogs=json_decode(file_get_contents("database/weblogs.txt"), true);
    unset($weblogs[$id]);
    file_put_contents("database/weblogs.txt", json_encode($weblogs));

    header("location: admin.php");

}
function searchWeblog($id)
{
    $weblogs = json_decode(file_get_contents("database/weblogs.txt"), true);
    return $weblogs[$id];
}
