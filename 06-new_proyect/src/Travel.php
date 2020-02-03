<?php

namespace Refactoring;
class Travel
{

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