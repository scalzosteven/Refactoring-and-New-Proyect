<?php

namespace Refactoring\Transport;

use Refactoring\Price;

class Train extends Type
{
    public function getTypeTransport()
    {
        return Price::TRAIN;
    }
    public function obtainPrice($peopleToTravel)
    {
        return $peopleToTravel * 50;
    }
}