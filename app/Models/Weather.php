<?php 

namespace app\Models;

class Weather {

    private $weather_id;
    private $weather;


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
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * Set the name of the weather
     *
     * @return  self
     */ 
    public function setWeather($weather)
    {
        $this->weather = $weather;

        return $this;
    }
}