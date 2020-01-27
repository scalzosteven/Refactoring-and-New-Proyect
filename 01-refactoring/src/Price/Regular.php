<?php


namespace Refactoring\Price;


use Refactoring\Movie;

class Regular extends Price
{
    public function getPriceCode()
    {
        return Movie::REGULAR;
    }

    public function obtainChange($daysRented)
    {
        $thisAmount = 0;
        $thisAmount += 2;
        if ($daysRented > 2) {
            $thisAmount += ($daysRented - 2) * 1.5;
        }
        return $thisAmount;
    }
}