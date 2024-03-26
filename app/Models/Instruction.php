<?php 

namespace app\Models;

use app\Utils\Database;
use PDO;

class Instruction extends CoreModel {

    private $instruction;
    private $is_batch_cookable;
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
        $pdo = Database::getPDO();
        $sql = 'INSERT INTO `instructions` 
                (`instruction`, `is_batch_cookable`, `position`, `recipe_id`) 
                VALUES (:instruction, :is_batch_cookable, :position, :recipe_id)';
        $pdoStatement = $pdo->prepare($sql); // au lieu d'un query
        $pdoStatement->bindValue(':instruction', $this->instruction, PDO::PARAM_STR);
        $pdoStatement->bindValue(':is_batch_cookable', $this->is_batch_cookable, PDO::PARAM_STR);
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
    public function getIsBatchCookable()
    {
        return $this->is_batch_cookable;
    }

    /**
     * Set if the instruction can be cooked as batchcooking
     *
     * @return  self
     */ 
    public function setIsBatchCookable($is_batch_cookable)
    {
        $this->is_batch_cookable = $is_batch_cookable;

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