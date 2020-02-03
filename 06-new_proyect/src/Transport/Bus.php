<?php

namespace Refactoring\Transport;

use Refactoring\Price;

class Bus extends Type
{
    public function getTypeTransport()
    {
        return Price::BUS;
    }
    public function obtainPrice($peopleToTravel)
    {
        return $peopleToTravel * 20;
    }
}