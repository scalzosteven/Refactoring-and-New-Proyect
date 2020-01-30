<?php

require_once(dirname(__DIR__).'/src/Customer.php');
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
//        $this->addTravel("Paris", TRANSPORT::CAR, OFFER::NORMAL, TYPE::GO, 3);
        $customer = $this->addTravel("Paris", 30, 1, 1, 3);

        // Act
//        $s = $this->customer->statement();


        // Assert
        $expected = $customer;
        $this->assertEquals($expected, 90);
    }
    /**
     * @param $city
     * @param $transport
     * @param $offer
     * @param $type
     * @param $persons
     */
    public function addTravel($city, $transport, $offer, $type, $persons)
    {
//        $this->customer->addTravel($city, $transport, $offer, $type, $persons);
          return $persons * $type * $transport * $offer;

    }
}
