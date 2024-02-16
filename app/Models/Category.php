<?php 

namespace app\Models;

class Category {

    private $category_id;
    private $category;


    /**
     * Get the id of the category
     */ 
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set the id of the category
     *
     * @return  self
     */ 
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the name of the category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the name of the category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
}