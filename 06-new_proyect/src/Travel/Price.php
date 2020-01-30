<?php


class Price
{
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
            case Travel::CAR:
                $thisAmount += $travel->getPeopleToTravel() * 30;

                break;
            case Travel::AIRPLANE:
                $thisAmount += $travel->getPeopleToTravel() * 100;

                break;
            case Travel::TRAIN:
                $thisAmount += $travel->getPeopleToTravel() * 50;

                break;
            case Travel::BUS:
                $thisAmount += $travel->getPeopleToTravel() * 20;

                break;

        }
        return $thisAmount;
    }
}