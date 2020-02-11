<?php

namespace Refactoring\usuarios\Transport;


abstract class Type
{
    public abstract function obtainPrice($peopleToTravel);
}