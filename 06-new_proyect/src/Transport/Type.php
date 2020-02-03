<?php

namespace Refactoring\Transport;


abstract class Type
{
    public abstract function obtainPrice($peopleToTravel);
}