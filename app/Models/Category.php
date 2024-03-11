<?php 

namespace app\Models;

use app\Utils\Database;
use PDO;

class Category extends CoreModel {

    private $name;


    /**
     * Find a category in DB from its id
     *
     * @param int $id is the id of the category
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `categories` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all categories in DB
     *
     * @return self
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `categories`";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Insert a category in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a category in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a category in DB
     *
     * @param [type] $id is the id of the category
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }

    /**
     * Get the name of the category
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the category
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}