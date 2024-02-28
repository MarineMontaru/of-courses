<?php

namespace app\Models;
use app\Utils\Database;
use PDO;

class Food {

    private $food_id;
    private $name;
    private $quantity;
    private $position;
    private $recipe_id;

    public function findAllByRecipe($recipeId) 
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `foods` WHERE `recipe_id` = {$recipeId} ORDER BY `position` ASC";
        $pdoStatement = $pdo->query($sql);
        $foods = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $foods;
    }

    /**
     * Get the id of the food
     */ 
    public function getFoodId()
    {
        return $this->food_id;
    }

    /**
     * Set the id of the food
     *
     * @return  self
     */ 
    public function setFoodId($food_id)
    {
        $this->food_id = $food_id;

        return $this;
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