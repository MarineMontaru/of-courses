<?php

namespace app\Models;

class Food {

    private $food_id;
    private $food;

    


    /**
     * Get the id of the food
     */ 
    public function getFoodId()
    {
        return $this->food_id;
    }

    /**
     * Set the id of the food
     *
     * @return  self
     */ 
    public function setFoodId($food_id)
    {
        $this->food_id = $food_id;

        return $this;
    }

    /**
     * Get the name of the food
     */ 
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Set the name of the food
     *
     * @return  self
     */ 
    public function setFood($food)
    {
        $this->food = $food;

        return $this;
    }
}