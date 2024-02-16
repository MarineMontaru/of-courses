<?php

namespace app\Models;

class Recipe {

    private $recipe_id;
    private $title;
    private $picture;
    private $creation_date;
    private $time;
    private $category_id;
    private $difficulty_id;
    private $weather_id;
    private $season_id;
    private $user_id;



    /**
     * Get the id of the recipe
     */ 
    public function getRecipeId()
    {
        return $this->recipe_id;
    }

    /**
     * Set the id of the recipe
     *
     * @return  self
     */ 
    public function setRecipeId($recipe_id)
    {
        $this->recipe_id = $recipe_id;

        return $this;
    }

    /**
     * Get the title of the recipe
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title of the recipe
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the path to the picture of the recipe
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the path to the picture of the recipe
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the creation date of the recipe
     */ 
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set the creation date of the recipe
     *
     * @return  self
     */ 
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the time required to cook the recipe
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the time required to cook the recipe
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get the category of the recipe
     */ 
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set the category of the recipe
     *
     * @return  self
     */ 
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the id of the difficulty level of the recipe
     */ 
    public function getDifficultyId()
    {
        return $this->difficulty_id;
    }

    /**
     * Set the id of the difficulty level of the recipe
     *
     * @return  self
     */ 
    public function setDifficultyId($difficulty_id)
    {
        $this->difficulty_id = $difficulty_id;

        return $this;
    }

    /**
     * Get the id of the weather when suitable to cook the recipe
     */ 
    public function getWeatherId()
    {
        return $this->weather_id;
    }

    /**
     * Set the id of the weather when suitable to cook the recipe
     *
     * @return  self
     */ 
    public function setWeatherId($weather_id)
    {
        $this->weather_id = $weather_id;

        return $this;
    }

    /**
     * Get the id of the season suitable for the foods of the recipe
     */ 
    public function getSeasonId()
    {
        return $this->season_id;
    }

    /**
     * Set the id of the season suitable for the foods of the recipe
     *
     * @return  self
     */ 
    public function setSeasonId($season_id)
    {
        $this->season_id = $season_id;

        return $this;
    }

    /**
     * Get the id of the user who created the recipe
     */ 
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the id of the user who created the recipe
     *
     * @return  self
     */ 
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}