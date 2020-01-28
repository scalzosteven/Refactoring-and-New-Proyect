<?php


namespace Refactoring\Price;

use Refactoring\Movie;

abstract class Price
{
    public abstract function getPriceCode();

    public abstract function obtainChange($daysRented);

    public function obtainFrequentRenterPoints($daysRented)
    {
        return 1 + $this->addBonusPoints($daysRented);
    }

    protected function addBonusPoints($daysRented)
    {
        $frequentRenterPoints = 0;
        if (($this->getPriceCode() == Movie::NEW_RELEASE)
            &&
            $daysRented > 1) {
            $frequentRenterPoints = $frequentRenterPoints + 1;
        }
        return $frequentRenterPoints;
    }
}