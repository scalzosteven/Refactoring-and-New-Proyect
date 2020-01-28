<?php


namespace Refactoring\Price;


use Refactoring\Movie;

class NewRelease extends Price
{
    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }

    public function obtainChange($daysRented)
    {
        return $daysRented * 3;
    }
}