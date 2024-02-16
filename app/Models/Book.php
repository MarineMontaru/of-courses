<?php

namespace app\Models;

class Book {

    private $book_id;
    private $title;
    private $position;
    private $creation_date;
    private $updated_date;
    private $user_id;



    /**
     * Get the id of the book
     */ 
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * Set the id of the book
     *
     * @return  self
     */ 
    public function setBookId($book_id)
    {
        $this->book_id = $book_id;

        return $this;
    }

    /**
     * Get the title of the book
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title of the book
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the position of the book among all users' books
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the position of the book among all users' books
     *
     * @return  self
     */ 
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the creation date of the book
     */ 
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set the creation date of the book
     *
     * @return  self
     */ 
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the update date of the book
     */ 
    public function getUpdatedDate()
    {
        return $this->updated_date;
    }

    /**
     * Set the update date of the book
     *
     * @return  self
     */ 
    public function setUpdatedDate($updated_date)
    {
        $this->updated_date = $updated_date;

        return $this;
    }

    /**
     * Get the id of the user who owns the book
     */ 
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the id of the user who owns the book
     *
     * @return  self
     */ 
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}