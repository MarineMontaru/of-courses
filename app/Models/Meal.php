<?php

namespace app\Models;

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

    }

    /**
     * Find all meals in DB
     *
     * @return array of objects Meal
     */
    public static function findAll()
    {

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