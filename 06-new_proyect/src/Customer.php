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
            
        }

    }



}