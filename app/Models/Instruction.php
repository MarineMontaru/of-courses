<?php 

namespace app\Models;

use app\Utils\Database;
use PDO;

class Instruction {

    private $instruction_id;
    private $instruction;
    private $batchcook;
    private $position;
    private $recipe_id;

    /**
     * Get the recipe from the database
     * @param {INT} $id is the id of the recipe in the database
     * @return {Object} returns the object Recipe of the id
     */ 
    public function findAllByRecipeId($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `instructions` WHERE `recipe_id` = {$id} ORDER BY `position` ASC";
        $pdoStatement = $pdo->query($sql);
        $instructions = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Instruction::class);
        return $instructions;
    }


    /**
     * Get the id of the instruction
     */ 
    public function getInstructionId()
    {
        return $this->instruction_id;
    }

    /**
     * Set the id of the instruction
     *
     * @return  self
     */ 
    public function setInstructionId($instruction_id)
    {
        $this->instruction_id = $instruction_id;

        return $this;
    }

     /**
     * Get the description of the instruction
     */ 
    public function getInstruction()
    {
        return $this->instruction;
    }

    /**
     * Set the description of the instruction
     *
     * @return  self
     */ 
    public function setInstruction($instruction)
    {
        $this->instruction = $instruction;

        return $this;
    }

    /**
     * Get if the instruction can be cooked as batchcooking
     */ 
    public function getBatchcook()
    {
        return $this->batchcook;
    }

    /**
     * Set if the instruction can be cooked as batchcooking
     *
     * @return  self
     */ 
    public function setBatchcook($batchcook)
    {
        $this->batchcook = $batchcook;

        return $this;
    }

    /**
     * Get the position of the instruction in the recipe
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the position of the instruction in the recipe
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