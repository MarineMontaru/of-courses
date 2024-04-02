<?php

namespace app\Models;

use app\Utils\Database;
use PDO;

class Food extends CoreModel {

    private $name;
    private $quantity;
    private $position;
    private $recipe_id;


    /**
     * Find a food in DB from its id
     *
     * @param int $id is the id of the food
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `foods` WHERE `id` = :id";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all foods in DB
     *
     * @return array of objects Food
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `foods`";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Find all foods in DB for a specific recipe
     *
     * @param int $recipeId is the id of the recipe
     * @return array of objects Food
     */
    public static function findAllByRecipe($recipeId) 
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `foods` WHERE `recipe_id` = :recipeId ORDER BY `position` ASC";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':recipeId', $recipeId, PDO::PARAM_INT);
        $pdoStatement->execute();
        $foods = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $foods;
    }

    /**
     * Insert a food in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {
        $pdo = Database::getPDO();
        $sql = 'INSERT INTO `foods` 
                (`name`, `quantity`, `position`, `recipe_id`) 
                VALUES (:name, :quantity, :position, :recipe_id)';
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':quantity', $this->quantity, PDO::PARAM_STR);
        $pdoStatement->bindValue(':position', $this->position, PDO::PARAM_INT);
        $pdoStatement->bindValue(':recipe_id', $this->recipe_id, PDO::PARAM_INT);
        $pdoStatement->execute();
        if($pdoStatement->rowCount() > 0) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Update a food in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a food in DB
     *
     * @param int $id is the id of the food
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }

    /**
     * Get the name of the food
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the food
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the quantity of food required for the number of portions by default for the repice
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the quantity of food required for the number of portions by default for the repice
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the position of the food in the recipe
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the position of the food in the recipe
     *
     * @return  self
     */ 
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the id of the recipe linked to the instruction
     */ 
    public function getRecipeId()
    {
        return $this->recipe_id;
    }

    /**
     * Set the id of the recipe linked to the instruction
     *
     * @return  self
     */ 
    public function setRecipeId($recipe_id)
    {
        $this->recipe_id = $recipe_id;

        return $this;
    }
}