<?php

namespace Refactoring;

class Customer
{
    private $_name;
    private $_rentals = array();

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function addRental(Rental $arg)
    {
        $this->_rentals[] = $arg;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function statement()
    {
        $frequentRenterPoints = 0;
        $rentals = $this->_rentals;

        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($rentals as $rental) {

            // add frequent renter points

            $frequentRenterPoints = $frequentRenterPoints +
                $rental->calculateFrequentRenterPoints();


            //show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->obtainChange()  . "\n";
        }
        //add footer lines
        $result .= "Amount owed is " . $this->calculateTotalAmount($rentals). "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points";


        return $result;
    }

    private function calculateTotalAmount($rentals){
        $totalAmount = 0;
        foreach ($rentals as $rental) {
            $totalAmount += $rental->obtainChange();
        }
        return $totalAmount;
    }

}
