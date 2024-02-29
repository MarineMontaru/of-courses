<?php 

namespace app\Models;
use app\Utils\Database;

class Weather extends CoreModel {

    private $name;


    /**
     * Find a weather in DB from its id
     *
     * @param int $id is the id of the weather
     * @return self
     */
    public static function find($id)
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `weathers` WHERE `id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $weather = $pdoStatement->fetchObject(self::class);
        return $weather;
    }

    /**
     * Find all weathers in DB
     *
     * @return array of objects Weather
     */
    public static function findAll()
    {

    }

    /**
     * Insert a weather in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a weather in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a weather in DB
     *
     * @param int $id is the id of the weather
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }


    /**
     * Get the name of the weather
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the weather
     *
     * @return  self
     */ 
    public function setWeather($name)
    {
        $this->name = $name;

        return $this;
    }
}