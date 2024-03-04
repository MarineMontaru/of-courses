<?php

namespace app\Models;

use app\Utils\Database;
use PDO;

class User extends CoreModel {

    private $name;
    private $firstname;
    private $email;
    
    /**
     * Find an user in DB from its id
     *
     * @param int $id is the id of the user
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `users` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all users in DB
     *
     * @return array of objects User
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `users`";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Insert an user in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update an user in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete an user in DB
     *
     * @param int $id is the id of the user
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

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