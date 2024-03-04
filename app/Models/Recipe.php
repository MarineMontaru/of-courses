<?php

namespace app\Models;

use app\Utils\Database;
use PDO;

class Recipe extends CoreModel {

    private $title;
    private $picture;
    private $creation_date;
    private $time;
    private $portions_default;
    private $category_id;
    private $difficulty_id;
    private $weather_id;
    private $user_id;



    /**
     * Find a recipe in DB from its id
     *
     * @param int $id is the id of the recipe
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `recipes` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all recipes in DB
     *
     * @return array of objects Recipe
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `recipes`";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Find the last recipes created in the database
     * 
     * @param int $nb is the number of recipes to be found in the databse
     * @return array of objects Recipe
     */ 
    public static function findAllLast($nb) 
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `recipes` 
                ORDER BY `creation_date` DESC 
                LIMIT ' . $nb;
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

    /**
     * Find all recipes created by or contained in the books of a specific user
     * 
     * @param int $userId is user's id
     * @return array of objects Recipe
     */ 
    public static function findAllByUser($userId) 
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT DISTINCT `recipes`.* FROM `recipes` 
                LEFT JOIN `recipes_books` 
                    ON `recipes`.`id` = `recipes_books`.`recipe_id`
                LEFT JOIN `books` 
                    ON `books`.`id` = `recipes_books`.`book_id` 
                WHERE `books`.`user_id` = ' . $userId . ' 
                    OR `recipes`.`user_id` = ' . $userId . ' 
                ORDER BY `recipes`.`title`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;    
    }

    /**
     * Find all recipes contained in one book
     * 
     * @param int $userId is the book id
     * @return array of objects Recipe
     */ 
    public static function findAllInBook($bookId) 
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT DISTINCT `recipes`.* FROM `recipes` 
                INNER JOIN `recipes_books` ON `recipes`.`id` = `recipes_books`.`recipe_id`
                WHERE `recipes_books`.`book_id` = ' . $bookId . '
                ORDER BY `recipes`.`title`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;    
    }

    /**
     * Insert a recipe in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a recipe in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a recipe in DB
     *
     * @param int $id is the id of the recipe
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }


    /**
     * Get the title of the recipe
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title of the recipe
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the path to the picture of the recipe
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the path to the picture of the recipe
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the creation date of the recipe
     */ 
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set the creation date of the recipe
     *
     * @return  self
     */ 
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the time required to cook the recipe
     */ 
    public function getTime()
    {
        if ($this->time >= 60) {
            $hours = intdiv($this->time, 60);
            $min = $this->time % 60;
            return $hours." h ".$min." min";
        } else {
            return $this->time . " min";
        }
        
    }

    /**
     * Set the time required to cook the recipe
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the number of portions for which the recipe is designed by default
     */ 
    public function getPortionsDefault()
    {
        return $this->portions_default;        
    }

    /**
     * Set the time required to cook the recipe
     *
     * @return  self
     */ 
    public function setPortionsDefault($portions)
    {
        $this->portions_default = $portions;

        return $this;
    }

    /**
     * Get the category of the recipe
     */ 
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set the category of the recipe
     *
     * @return  self
     */ 
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the id of the difficulty level of the recipe
     */ 
    public function getDifficultyId()
    {
        return $this->difficulty_id;
    }

    /**
     * Set the id of the difficulty level of the recipe
     *
     * @return  self
     */ 
    public function setDifficultyId($difficulty_id)
    {
        $this->difficulty_id = $difficulty_id;

        return $this;
    }

    /**
     * Get the id of the weather when suitable to cook the recipe
     */ 
    public function getWeatherId()
    {
        return $this->weather_id;
    }

    /**
     * Set the id of the weather when suitable to cook the recipe
     *
     * @return  self
     */ 
    public function setWeatherId($weather_id)
    {
        $this->weather_id = $weather_id;

        return $this;
    }

    /**
     * Get the id of the user who created the recipe
     */ 
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the id of the user who created the recipe
     *
     * @return  self
     */ 
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}