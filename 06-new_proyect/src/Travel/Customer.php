<?php


class Customer
{
    private $_name;
    private $_travels = array();

    function __construct($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function addTravel(Price $arg)
    {
        $this->_travels[] = $arg;
    }

    public function statement() {
        $totalAmount = 0;
        $travels = $this->_travels;

        $result = "Travel by " . $this->getName() . " to\n";

        foreach ($travels as $travel){


            $thisAmount = $travel->calculateTotalAmount($travel);

            $totalAmount += $thisAmount;
            $result = $result . "\t" . $travel->getTravel()->getCity(). ": " . $thisAmount . "\n";
        }
        $result = $result . "\t-Total: " . $totalAmount ."\n";

        return $result;

    }
    
}