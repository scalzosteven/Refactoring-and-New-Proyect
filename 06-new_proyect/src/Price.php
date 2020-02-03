<?php

namespace Refactoring;

use Refactoring\Transport\AirPlane;
use Refactoring\Transport\Bus;
use Refactoring\Transport\Car;
use Refactoring\Transport\Train;

class Price
{
    const CAR = 0;
    const AIRPLANE = 1;
    const TRAIN = 2;
    const BUS = 3;
    private $_city;
    private $_price;


    function __construct($city, $typeTransport)
    {
        $this->_city = $city;
        $this->setPrice($typeTransport);
    }

    public function getTypeTransport(){
        return$this->_price->getTypeTransport();
    }

    public function getCity()
    {
        return $this->_city;
    }
    public function obtainPrice($peopleToTravel){
        return $this->_price->obtainPrice($peopleToTravel);
    }

    public function setPrice($typeTransport)
    {
        switch ($typeTransport) {
            case self::CAR:
                $this->_price = new Car();

                break;
            case self::AIRPLANE:
                $this->_price = new AirPlane();

                break;
            case self::TRAIN:
                $this->_price = new Train();

                break;
            case self::BUS:
                $this->_price = new Bus();

                break;

        }
    }
}