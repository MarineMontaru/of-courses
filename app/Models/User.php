<?php

namespace app\Models;

class User {

    private $user_id;
    private $name;
    private $firstname;
    private $email;
    


    /**
     * Get user's id
     */ 
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set user's id
     *
     * @return  self
     */ 
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get user's name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set user's id
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get user's firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set user's firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get user's email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set user's email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}