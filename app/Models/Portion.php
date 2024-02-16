<?php

namespace app\Models;

class Portion {

    private $portions_id;
    private $portions_nb;

    


    /**
     * Get the id of the portions
     */ 
    public function getPortionsId()
    {
        return $this->portions_id;
    }

    /**
     * Set the id of the portions
     *
     * @return  self
     */ 
    public function setPortionsId($portions_id)
    {
        $this->portions_id = $portions_id;

        return $this;
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