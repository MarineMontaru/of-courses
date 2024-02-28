<?php 

namespace app\Models;

use app\Utils\Database;
use PDO;

class Category {

    private $category_id;
    private $category;


    /**
    * Get the category name from its id
    * @param {INT} $id is the id of the category of recipe
    * @return {String} returns the name of the category
    */ 
    public function find($id) {

        $pdo = Database::getPDO();
        $sql = "SELECT * FROM `categories` WHERE `category_id` = {$id}";
        $pdoStatement = $pdo->query($sql);
        $category = $pdoStatement->fetchObject(Category::class);
        return $category;

    }

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