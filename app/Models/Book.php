<?php

namespace app\Models;

use app\Utils\Database;
use PDO;

class Book extends CoreModel {

    private $title;
    private $position;
    private $creation_date;
    private $update_date;
    private $user_id;


    /**
     * Find a book in DB from its id
     *
     * @param int $id is the id of the book
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `books` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all books in DB
     *
     * @return array of objects Book
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `books`";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Find all books owned by an user in DB
     *
     * @param int $userId is the id of the user owning the books (currently connected)
     * @return array of objects Book
     */
    public static function findAllByUser($userId)
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `books` 
                WHERE `user_id` = ' . $userId . ' 
                ORDER BY `title`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

    /**
     * Insert a book in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {
        $pdo = Database::getPDO();
        $sql = 'INSERT INTO `books`
                (`title`, `position`, `user_id`)
                VALUES (:title, :position, :user_id)';

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':position', $this->position, PDO::PARAM_INT);
        $pdoStatement->bindValue(':user_id', $this->user_id, PDO::PARAM_INT);

        $pdoStatement->execute();
        return ($pdoStatement->rowCount() > 0);
    
    }

    /**
     * Update a book in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a book in DB
     *
     * @param int $id is the id of the book
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

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
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Set the update date of the book
     *
     * @return  self
     */ 
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;

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