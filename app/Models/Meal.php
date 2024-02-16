<?php

namespace app\Models;

class Meal {

    private $meal_id;
    private $meal_date_time;

    

    /**
     * Get the id of the meal
     */ 
    public function getMealId()
    {
        return $this->meal_id;
    }

    /**
     * Set the id of the meal
     *
     * @return  self
     */ 
    public function setMealId($meal_id)
    {
        $this->meal_id = $meal_id;

        return $this;
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