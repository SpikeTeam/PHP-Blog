<?php

namespace Models;


use Service\Post\PostService;

class Post
{
    private $id;
    private $title;
    private $about;
    private $content;
    private $user_id;
    private $author;
    private $date_posted;

    public function getTitle()
    {
        return $this->title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($username)
    {
        $this->author = $username;
    }
    public function getDatePosted(){
       $datePosted =  new \DateTime($this->date_posted);
       $datePosted = $datePosted->format("F j, Y");
        return $datePosted;
    }
}