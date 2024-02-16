<?php 

namespace app\Models;

class Difficulty {

    private $difficulty_id;
    private $difficulty;





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