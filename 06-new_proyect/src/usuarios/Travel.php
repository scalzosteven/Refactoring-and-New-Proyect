<?php

namespace Refactoring\usuarios;
class Travel
{
    private $_travel;
    private $_peopleToTravel;
    
    function __construct($travel, $peopleToTravel)
    {
        $this->_travel = $travel;
        $this->_peopleToTravel = $peopleToTravel;
    }

    public function getPeopleToTravel()
    {
        return $this->_peopleToTravel;
    }

    public function obtainPrice()
    {
        return $this->getTravel()->obtainPrice($this->getPeopleToTravel());
    }

    public function getTravel(){
        return $this->_travel;
    }
}