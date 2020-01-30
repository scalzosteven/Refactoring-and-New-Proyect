<?php


class Travel
{
    const CAR = 0;
    const AIRPLANE = 1;
    const TRAIN = 2;
    const BUS = 3;
    private $_city;
    private $_transport;
    
    function __construct($city, $transport)
    {
        $this->_city = $city;
        $this->_transport = $transport;
    }
    
    public function getTransport(){
        return $this->_transport;
    }
    
    public function setTransport($arg){
        $this->_transport = $arg;
    }
    
    public function getCity(){
        return $this->_city;
    }

}