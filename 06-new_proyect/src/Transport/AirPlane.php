<?php

namespace Refactoring\Transport;

use Refactoring\Price;
class AirPlane extends Type
{
    public function getTypeTransport()
    {
        return Price::AIRPLANE;
    }
    public function obtainPrice($peopleToTravel)
    {
        return $peopleToTravel * 100;
    }
}