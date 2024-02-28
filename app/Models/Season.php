<?php

namespace app\Models;
use app\Utils\Database;
use PDO;

class Season {

    private $season_id;
    private $name;
    private $picture;

    
    public function findAllByRecipe($recipeId) 
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT `seasons`.*
		    FROM `seasons`
		    INNER JOIN `recipes_seasons` ON recipes_seasons.season_id = seasons.season_id
            INNER JOIN `recipes` ON recipes_seasons.recipe_id = recipes.recipe_id 
	    	WHERE `recipes`.recipe_id = :id';
        $pdoStatement = $pdo->prepare($sql);
	    $pdoStatement->bindValue(':id', $recipeId, PDO::PARAM_INT);
	    $pdoStatement->execute();
	    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
	    return $results;
    }

    /**
     * Get the id of the season
     */ 
    public function getSeasonId()
    {
        return $this->season_id;
    }

    /**
     * Set the id of the season
     *
     * @return  self
     */ 
    public function setSeasonId($season_id)
    {
        $this->season_id = $season_id;

        return $this;
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