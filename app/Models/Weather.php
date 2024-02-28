<?php 

namespace app\Models;
use app\Utils\Database;

class Weather {

    private $weather_id;
    private $name;


    /**
    * Get the weather name from its id
    * @param {INT} $id is the id of the weather of recipe
    * @return {String} returns the name of the weather
    */ 
    public function find($id) 
    {
        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `weathers` WHERE `weather_id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $weather = $pdoStatement->fetchObject(self::class);
        return $weather;
    }

    /**
     * Get the id of the weather
     */ 
    public function getWeatherId()
    {
        return $this->weather_id;
    }

    /**
     * Set the id of the weather
     *
     * @return  self
     */ 
    public function setWeatherId($weather_id)
    {
        $this->weather_id = $weather_id;

        return $this;
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