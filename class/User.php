<?php

class User
{
    public $fullName;
    public $email;
    public $password;

    public $weblogs;

    public function __construct($fullName, $email, $password)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->weblogs = [];
    }
    public function getFullName()
    {
        return $this->fullName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getWeblogs()
    {
        return $this->weblogs;
    }
    public function addWeblog(Weblog $weblog)
    {
        $this->weblogs[$weblog->getTitle()] = $weblog;
    }
    public function removeWeblog(Weblog $weblog)
    {
        unset($this->weblogs[$weblog->getTitle()]);
    }

    public  static function searchUser(string $userEmail)
    {
        $users = json_decode(file_get_contents('database/users.txt'), true);

        if(array_key_exists($userEmail, $users)) {
            return $users[$userEmail];
        } else {
            return null;
        }
    }

    public static function addUser(User $user)
    {
        $users = json_decode(file_get_contents('database/users.txt'), true);
        $users[$user->getEmail()] = $user;
        file_put_contents('database/users.txt', json_encode($users));
    }
    public function toArray()
    {
        return [
            'fullName' => $this->fullName,
            'email' => $this->email,
            'password' => $this->password,
            'weblogs' => $this->weblogs
        ];
    }
}
