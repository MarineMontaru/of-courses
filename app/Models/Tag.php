<?php 

namespace app\Models;

class Tag {

    private $tag_id;
    private $tag;
    private $position;
    private $always_proposed;

    


    /**
     * Get the id of the tag
     */ 
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * Set the id of the tag
     *
     * @return  self
     */ 
    public function setTagId($tag_id)
    {
        $this->tag_id = $tag_id;

        return $this;
    }

    /**
     * Get the name of the tag
     */ 
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the name of the tag
     *
     * @return  self
     */ 
    public function setTag($tag)
    {
        $this->tag = $tag;

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