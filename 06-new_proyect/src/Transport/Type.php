<?php

namespace Refactoring\Transport;


abstract class Type
{
    public abstract function getTypeTransport();

    public abstract function obtainPrice($peopleToTravel);
}