<?php

namespace app\Models;

class Season {

    private $season_id;
    private $season;

    


    /**
     * Get the id of the season
     */ 
    public function getSeasonId()
    {
        return $this->season_id;
    }

    /**
     * Set the id of the season
     *
     * @return  self
     */ 
    public function setSeasonId($season_id)
    {
        $this->season_id = $season_id;

        return $this;
    }

    /**
     * Get the name of the season
     */ 
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set the name of the season
     *
     * @return  self
     */ 
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }
}