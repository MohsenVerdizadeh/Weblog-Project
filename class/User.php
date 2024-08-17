<?php

class User
{
    public $fullname;
    public $email;
    public $password;

    public $weblogs;

    public function __construct($fullname, $email, $password)
    {
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->weblogs = [];
    }
    public function getFullname()
    {
        return $this->fullname;
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

    public function toArray()
    {
        return [
            'fullname' => $this->fullname,
            'email' => $this->email,
            'password' => $this->password,
            'weblogs' => $this->weblogs
        ];
    }
}
