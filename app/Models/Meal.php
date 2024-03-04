<?php

namespace app\Models;

use app\Utils\Database;
use PDO;

class Meal extends CoreModel {

    private $meal_date_time;


    /**
     * Find a meal in DB from its id
     *
     * @param int $id is the id of the meal
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `meals` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }

    /**
     * Find all meals in DB
     *
     * @return array of objects Meal
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `meals`";
        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    /**
     * Insert a meal in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a meal in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a meal in DB
     *
     * @param int $id is the id of the meal
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }

    /**
     * Get the date and time of the meal
     */ 
    public function getMealDateTime()
    {
        return $this->meal_date_time;
    }

    /**
     * Set the date and time of the meal
     *
     * @return  self
     */ 
    public function setMealDateTime($meal_date_time)
    {
        $this->meal_date_time = $meal_date_time;

        return $this;
    }
}