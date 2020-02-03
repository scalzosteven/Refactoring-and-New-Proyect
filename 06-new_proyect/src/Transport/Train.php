<?php

namespace Refactoring\Transport;

use Refactoring\Price;

class Train extends Type
{
    public function obtainPrice($peopleToTravel)
    {
        return $peopleToTravel * 50;
    }
}