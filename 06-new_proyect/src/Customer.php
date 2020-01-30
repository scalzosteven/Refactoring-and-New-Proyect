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

}