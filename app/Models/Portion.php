<?php

namespace app\Models;

use app\Utils\Database;
use PDO;

class Portion extends CoreModel {

    private $portions_nb;


    /**
     * Find a portion in DB from its id
     *
     * @param int $id is the id of the portion
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `portions` WHERE `id` = :id";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all portions in DB
     *
     * @return array of objects Portion
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `portions`";
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->execute();
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Insert a portion in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a portion in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a portion in DB
     *
     * @param int $id is the id of the portion
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }

    /**
     * Get the number of portions
     */ 
    public function getPortionsNb()
    {
        return $this->portions_nb;
    }

    /**
     * Set the number of portions
     *
     * @return  self
     */ 
    public function setPortionsNb($portions_nb)
    {
        $this->portions_nb = $portions_nb;

        return $this;
    }
}