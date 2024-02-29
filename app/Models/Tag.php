<?php 

namespace app\Models;
use app\Utils\Database;
use PDO;

class Tag extends CoreModel {

    private $name;
    private $position;
    private $always_proposed;


    /**
     * Find a tag in DB from its id
     *
     * @param int $id is the id of the tag
     * @return self
     */
    public static function find($id)
    {

    }

    /**
     * Find all tags in DB
     *
     * @return array of objects Tag
     */
    public static function findAll()
    {

    }

    /**
     * Find all tags in DB linked to a recipe
     * 
     * @param int $recipeId is the id of the recipe
     * @return array of objects Tag
     */
    public function findAllByRecipe($recipeId) 
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT `tags`.*
		    FROM `tags`
		    INNER JOIN `recipes_tags` ON recipes_tags.tag_id = tags.id
            INNER JOIN `recipes` ON recipes_tags.recipe_id = recipes.id 
	    	WHERE `recipes`.id = :id';
        $pdoStatement = $pdo->prepare($sql);
	    $pdoStatement->bindValue(':id', $recipeId, PDO::PARAM_INT);
	    $pdoStatement->execute();
	    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
	    return $results;
    }

    /**
     * Insert a tag in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a tag in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a tag in DB
     *
     * @param int $id is the id of the tag
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }

    /**
     * Get the name of the tag
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the tag
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the position of the tag among the list of tags
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the position of the tag among the list of tags
     *
     * @return  self
     */ 
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get if the tag is always proposed to the user among the list of tags
     */ 
    public function getAlwaysProposed()
    {
        return $this->always_proposed;
    }

    /**
     * Set if the tag is always proposed to the user among the list of tags
     *
     * @return  self
     */ 
    public function setAlwaysProposed($always_proposed)
    {
        $this->always_proposed = $always_proposed;

        return $this;
    }
}