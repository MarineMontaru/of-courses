<?php 

namespace app\Models;

class Instruction {

    private $instruction_id;
    private $batchcook;
    private $position;

    


    /**
     * Get the id of the instruction
     */ 
    public function getInstructionId()
    {
        return $this->instruction_id;
    }

    /**
     * Set the id of the instruction
     *
     * @return  self
     */ 
    public function setInstructionId($instruction_id)
    {
        $this->instruction_id = $instruction_id;

        return $this;
    }

    /**
     * Get if the instruction can be cooked as batchcooking
     */ 
    public function getBatchcook()
    {
        return $this->batchcook;
    }

    /**
     * Set if the instruction can be cooked as batchcooking
     *
     * @return  self
     */ 
    public function setBatchcook($batchcook)
    {
        $this->batchcook = $batchcook;

        return $this;
    }

    /**
     * Get the position of the instruction in the recipe
     */ 
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the position of the instruction in the recipe
     *
     * @return  self
     */ 
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }
}