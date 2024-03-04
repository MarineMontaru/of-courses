<?php

namespace app\Models;

use app\Utils\Database;
use PDO;

class Season extends CoreModel {

    private $name;
    private $picture;

    
    /**
     * Find a season in DB from its id
     *
     * @param int $id is the id of the season
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `seasons` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all seasons in DB
     *
     * @return array of objects Season
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `seasons`";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Find all seasons in DB linked to a recipe
     *
     * @param int $recipeId is the id of the recipe
     * @return array of objects Season
     */
    public static function findAllByRecipe($recipeId) 
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT `seasons`.*
		    FROM `seasons`
		    INNER JOIN `recipes_seasons` ON recipes_seasons.season_id = seasons.id
            INNER JOIN `recipes` ON recipes_seasons.recipe_id = recipes.id 
	    	WHERE `recipes`.id = :id';
        $pdoStatement = $pdo->prepare($sql);
	    $pdoStatement->bindValue(':id', $recipeId, PDO::PARAM_INT);
	    $pdoStatement->execute();
	    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
	    return $results;
    }

    /**
     * Insert a season in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a season in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a season in DB
     *
     * @param int $id is the id of the season
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }

    /**
     * Get the name of the season
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the season
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the picture of the season
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the picture of the season
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
}