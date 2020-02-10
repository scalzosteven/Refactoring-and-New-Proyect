<?php

namespace Refactoring\Models\Transport;

use Refactoring\Price;

class Train extends Type
{
    public function obtainPrice($peopleToTravel)
    {
        return $peopleToTravel * 50;
    }
}