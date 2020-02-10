<?php

namespace Refactoring\Models\Transport;

use Refactoring\Price;

class Bus extends Type
{
    public function obtainPrice($peopleToTravel)
    {
        return $peopleToTravel * 20;
    }
}