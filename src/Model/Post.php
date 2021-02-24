<?php
namespace App\Model;

class Post
{
    private $id;

    private $userId;

    private $title;

    private $body;

    public function getId() 
    {
      return $this->id;
    }

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getUserId()
    {
      return $this->userId;
    }

    public function setUserId($userId)
    {
      $this->userId = $userId;
    }

    public function getTitle()
    {
      return $this->title;
    }

    public function setTitle($title)
    {
      $this->title = $title;
    }

    public function getBody()
    {
      return $this->body;
    }

    public function setBody($body)
    {
      $this->body = $body;
    }
}
