<?php

namespace App\Entity;

class PropertySearch {


    /**
     * @var integer|null
     */
    public $minKms ;


    /**
     * Get the value of minKms
     *
     * @return  integer|null
     */ 
    public function getMinKms()
    {
        return $this->minKms;
    }

    /**
     * Set the value of minKms
     *
     * @param  integer|null  $minKms
     *
     * @return  self
     */ 
    public function setMinKms($minKms)
    {
        $this->minKms = $minKms;

        return $this;
    }
}