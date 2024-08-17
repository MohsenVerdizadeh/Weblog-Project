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
