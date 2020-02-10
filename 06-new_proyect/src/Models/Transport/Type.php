<?php

namespace Refactoring\Models\Transport;


abstract class Type
{
    public abstract function obtainPrice($peopleToTravel);
}