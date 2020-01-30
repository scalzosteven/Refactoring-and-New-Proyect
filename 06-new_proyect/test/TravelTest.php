<?php

require_once(dirname(__DIR__).'/src/Customer.php');
require_once(dirname(__DIR__).'/src/Price.php');
require_once(dirname(__DIR__).'/src/Travel.php');


class TravelTest extends PHPUnit_Framework_TestCase
{
    public $customer;
    
    public function setUp()
    {
        $this->customer = new Customer("Customer");
    }


    /**
     * @test
     */
    public function statment_Travel_Car_Normal_Go_TreePersons (){

        //Arrange
        $this->addTravel("Paris", Travel::CAR,  3);

        // Act
        $s = $this->customer->statement();

        // Assert
        $expected = "Travel by Customer to Paris: 90. Total: 90";
        $this->assertEquals($expected, $s);
    }
    /**
     * @param $city
     * @param $transport
     * @param $persons
     */
    public function addTravel($city, $transport, $persons)
    {
        $this->customer->addTravel(new Price(new Travel($city, $transport), $persons));
    }
}
