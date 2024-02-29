<?php 

namespace app\Models;
use app\Utils\Database;

class Difficulty extends CoreModel {

    private $difficulty;


    /**
     * Find a difficulty in DB from its id
     *
     * @param int $id is the id of the difficulty
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `difficulties` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $difficulty = $pdoStatement->fetchObject(Difficulty::class);
        return $difficulty;
    }

    /**
     * Find all difficulties in DB
     *
     * @return array of objects Difficulty
     */
    public static function findAll()
    {

    }

    /**
     * Insert a difficulty in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a difficulty in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a difficulty in DB
     *
     * @param int $id is the id of the difficulty
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

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