<?php


class Customer
{
    private $_name;
    private $_travels = array();


    public function getName()
    {
        return $this->_name;
    }

    public function addTravel(Travel $arg)
    {
        $this->_travels[] = $arg;
    }

    public function statement() {
        $totalAmount = 0;
        $travels = $this->_travels;

        $result = "Travel by " . $this->getName();

        foreach ($travels as $travel){

            $thisAmount = 0;

            //determine amounts for each travel
            switch ($travel->getTravel()->getTransport())
            {
                case Travel::CAR:
                    $thisAmount += $travel->getPeopleToTravel() + 30;

                    break;
                case Travel::AIRPLANE:
                    $thisAmount += $travel->getPeopleToTravel() + 100;

                    break;
                case Travel::TRAIN:
                    $thisAmount += $travel->getPeopleToTravel() + 50;

                    break;
                case Travel::BUS:
                    $thisAmount += $travel->getPeopleToTravel() + 20;

                    break;

            }
        }

    }



}