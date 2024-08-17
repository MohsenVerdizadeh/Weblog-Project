<?php

class Weblog
{
    public $title;

    public $author;
    public $authorEmail;
    public $content;

    public $id;

    public function __construct($title,$author, $authorEmail, $content)
    {
        $this->title = $title;
        $this->author = $author;
        $this->authorEmail = $authorEmail;
        $this->content = $content;
        $this->id = sha1($this->title . $this->authorEmail);
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }


    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }
    public function getContent()
    {
        return $this->content;
    }

    public function __destruct()
    {

    }

    public static function addWeblog(Weblog $weblog)
    {
        $author_information = User::searchUser($weblog->getAuthorEmail());
        $author_weblogs = $author_information['weblogs'];
        $author_weblogs[$weblog->id] = $weblog;
        $new_user = new User($author_information['fullName'], $author_information['email'], $author_information['password']);
        $new_user->weblogs = $author_weblogs;
        User::addUser($new_user);

        $weblogs = json_decode(file_get_contents('database/weblogs.txt'),true);
        //  echo var_dump($weblogs)."<br>";
        //  echo var_dump($weblog);
        $weblogs[$weblog->id] = $weblog;
        file_put_contents('database/weblogs.txt', json_encode($weblogs));

    }

    public static function listWeblogs()
    {
        $weblogs=json_decode(file_get_contents("database/weblogs.txt"),true);
        if (count($weblogs) == 0) {
            echo'we dont have any weblogs'."<br>";

        } else {
            foreach ($weblogs as $id => $weblog) {
                echo "<a href='show_weblog.php?id=".$id."'>".$weblog['title']."--->".$weblog['author']. "</a>"."<br>";
            }
        }

    }

    public static function removeWeblog(string $userEmail,string $id)
    {
        $authorInformation= User::searchUser($userEmail);
        $user_weblogs = $authorInformation["weblogs"];
        // delete weblog
        unset($user_weblogs[$id]);
        //create new user with edited information
        $new_user = new User($authorInformation["fullName"], $authorInformation["email"], $authorInformation["password"]);
        $new_user->weblogs = $user_weblogs;
        // write in database
        User::addUser($new_user);

        $weblogs=json_decode(file_get_contents("database/weblogs.txt"), true);
        unset($weblogs[$id]);
        file_put_contents("database/weblogs.txt", json_encode($weblogs));

        header("location: admin.php");

    }

    public static function searchWeblog($id)
    {
        $weblogs = json_decode(file_get_contents("database/weblogs.txt"), true);
        return $weblogs[$id];
    }

     public function toArray() {
         return [
             "title"=> $this->getTitle(),
             "author"=> $this->getAuthor(),
             "authorEmail"=> $this->getAuthorEmail(),
             "content"=> $this->getContent(),
             "id"=> $this->id,
         ];
     }
}
