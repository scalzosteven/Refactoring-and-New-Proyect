<?php

namespace Refactoring;

class Rental
{
    private $_movie;
    private $_daysRented;

    public function __construct($movie, $daysRented)
    {
        $this->_movie = $movie;
        $this->_daysRented = $daysRented;
    }

    public function getDaysRented()
    {
        return $this->_daysRented;
    }

    public function getMovie()
    {
        return $this->_movie;
    }

    public function obtainChange()
    {
        return $this->getMovie()->obtainChange($this->getDaysRented());
    }

    public function calculateFrequentRenterPoints()
    {
        return $this->getMovie()->calculateFrequentRenterPoints($this->_daysRented);
    }

}
