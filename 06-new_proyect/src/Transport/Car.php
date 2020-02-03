<?php

namespace Refactoring\Transport;

use Refactoring\Price;

class Car extends Type
{
    public function obtainPrice($peopleToTravel)
    {
        return $peopleToTravel * 30;
    }
}