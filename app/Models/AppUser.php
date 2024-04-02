<?php

namespace app\Models;

use app\Utils\Database;
use PDO;

class AppUser extends CoreModel {

    private $lastname;
    private $firstname;
    private $email;
    private $password;
    private $role;
    
    /**
     * Find an user in DB from its id
     *
     * @param int $id is the id of the user
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `users` WHERE `id` = :id';
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find an user in DB from its email
     *
     * @param int $id is the email of the user
     * @return self
     */
    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();
            $sql = 'SELECT * FROM `users` WHERE `email` = :email';
            $pdoStatement = $pdo->prepare($sql);
            $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);
            $pdoStatement->execute();
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
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute();
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
     * Get user's lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set user's lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

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

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}