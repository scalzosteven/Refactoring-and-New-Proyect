<?php

namespace Refactoring;

class CustomerToTravel
{
    private $_name;
    public $_travels = array();

    function __construct($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function addTravel(Travel $arg)
    {
        $this->_travels[] = $arg;
    }

    public function statement() {
        $travels = $this->_travels;
        $result = "Travel by " . $this->getName() . " to\n";

        foreach ($travels as $travel){

            $result = $result . "\t" . $travel->getTravel()->getCity(). ": " . $travel->obtainPrice() . "\n";
        }
        $result = $result . "\t-Total: " . $this->getPrice($this->_travels) ."\n";

        return $result;

    }

    public function getPrice($travels){
        $totalAmount = 0;
        foreach ($travels as $travel) {
            $totalAmount += $travel->obtainPrice();
        }
        return $totalAmount;
    }

}