<?php


class Price
{
    const CAR = 0;
    const AIRPLANE = 1;
    const TRAIN = 2;
    const BUS = 3;
    private $_travel;
    private $_peopleToTravel;

    function __construct($travel, $peopleToTravel)
    {
        $this->_travel = $travel;
        $this->_peopleToTravel = $peopleToTravel;
    }

    public function getPeopleToTravel(){
        return $this->_peopleToTravel;
    }

    public function getTravel(){
        return $this->_travel;
    }

    public function calculateTotalAmount($travel)
    {
        $thisAmount = 0;
        switch ($travel->getTravel()->getTransport()) {
            case self::CAR:
                $thisAmount += $travel->getPeopleToTravel() * 30;

                break;
            case self::AIRPLANE:
                $thisAmount += $travel->getPeopleToTravel() * 100;

                break;
            case self::TRAIN:
                $thisAmount += $travel->getPeopleToTravel() * 50;

                break;
            case self::BUS:
                $thisAmount += $travel->getPeopleToTravel() * 20;

                break;

        }
        return $thisAmount;
    }
}