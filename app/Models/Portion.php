<?php

namespace app\Models;

class Portion extends CoreModel {

    private $portions_nb;


    /**
     * Find a portion in DB from its id
     *
     * @param int $id is the id of the portion
     * @return self
     */
    public static function find($id)
    {

    }

    /**
     * Find all portions in DB
     *
     * @return array of objects Portion
     */
    public static function findAll()
    {

    }

    /**
     * Insert a portion in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function insert()
    {

    }

    /**
     * Update a portion in DB
     *
     * @return bool true = suceed / false = failed
     */
    public function update()
    {

    }

    /**
     * Delete a portion in DB
     *
     * @param int $id is the id of the portion
     * @return bool true = suceed / false = failed
     */
    public static function delete($id)
    {

    }

    /**
     * Get the number of portions
     */ 
    public function getPortionsNb()
    {
        return $this->portions_nb;
    }

    /**
     * Set the number of portions
     *
     * @return  self
     */ 
    public function setPortionsNb($portions_nb)
    {
        $this->portions_nb = $portions_nb;

        return $this;
    }
}