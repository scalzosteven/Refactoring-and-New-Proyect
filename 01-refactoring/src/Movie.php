<?php

namespace Refactoring;

use Refactoring\Price\Children;
use Refactoring\Price\NewRelease;
use Refactoring\Price\Price;
use Refactoring\Price\Regular;

class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;
    private $_title;
    /**@var  Price*/
    private $_price;

    public function __construct($title, $priceCode)
    {
        $this->_title = $title;
        $this->setPrice($priceCode);
    }

    public function getPriceCode()
    {
        return $this->_price->getPriceCode();
    }

    public function setPriceCode($arg)
    {
        $this->_price = $arg;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function obtainChange($daysRented)
    {
        $thisAmount = 0;
        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $thisAmount += 2;
                if ($daysRented > 2) {
                    $thisAmount += ($daysRented - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $thisAmount += $daysRented * 3;
                break;
            case Movie::CHILDRENS:
                $thisAmount += 1.5;
                if ($daysRented > 3) {
                    $thisAmount += ($daysRented - 3) * 1.5;
                }
                break;
        }
        return $thisAmount;
    }

    public function obtainFrequentRenterPoints($daysRented)
    {
        return 1 + $this->addBonusPoints($daysRented);
    }

    private function addBonusPoints($daysRented)
    {
        $frequentRenterPoints = 0;
        if (($this->getPriceCode() == Movie::NEW_RELEASE)
            &&
            $daysRented > 1) {
            $frequentRenterPoints = $frequentRenterPoints + 1;
        }
        return $frequentRenterPoints;
    }

    private function setPrice($priceCode)
    {
        switch ($priceCode){
            case self::REGULAR:
                $this->_price = new Regular();
                break;
            case self::NEW_RELEASE:
                $this->_price = new NewRelease();
                break;
            case self::CHILDRENS:
                $this->_price = new Children();

        }

    }
}
