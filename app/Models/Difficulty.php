<?php 

namespace app\Models;

use app\Utils\Database;
use PDO;

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
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all difficulties in DB
     *
     * @return array of objects Difficulty
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `difficulties`";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
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