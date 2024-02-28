<?php 

namespace app\Models;
use app\Utils\Database;

class Difficulty {

    private $difficulty_id;
    private $difficulty;


    /**
    * Get the difficulty name from its id
    * @param {INT} $id is the id of the difficulty of recipe
    * @return {String} returns the name of the difficulty
    */ 
    public function find($id) 
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `difficulties` WHERE `difficulty_id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $difficulty = $pdoStatement->fetchObject(Difficulty::class);
        return $difficulty;
    }


    /**
     * Get the id of the difficulty level
     */ 
    public function getDifficultyId()
    {
        return $this->difficulty_id;
    }

    /**
     * Set the id of the difficulty level
     *
     * @return  self
     */ 
    public function setDifficultyId($difficulty_id)
    {
        $this->difficulty_id = $difficulty_id;

        return $this;
    }

    /**
     * Get the name of the difficulty level
     */ 
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * Set the name of the difficulty level
     *
     * @return  self
     */ 
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;

        return $this;
    }
}