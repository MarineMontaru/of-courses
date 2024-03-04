<?php 

namespace app\Models;

use app\Utils\Database;
use PDO;

class Instruction extends CoreModel {

    private $instruction;
    private $batchcook;
    private $position;
    private $recipe_id;


    /**
     * Find an instruction in DB from its id
     *
     * @param int $id is the id of the instruction
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `instructions` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all instructions in DB
     *
     * @return array of objects Instruction
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `instructions`";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Get the instructions from DB for a specific recipe
     * 
     * @param int $id is the id of the recipe
     * @return array of objects Instruction
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
     * Insert an instruction in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update an instruction in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete an instruction in DB
     *
     * @param int $id is the id of the instruction
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

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