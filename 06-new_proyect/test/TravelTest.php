<?php

namespace Refactoring;
class TravelTest extends \PHPUnit_Framework_TestCase
{
    public $customer;

    public function setUp()
    {
        $this->customer = new CustomerToTravel("Steven");
    }
    /**
     * @test
     */
    public function set_name_jose_and_return_jose (){

        // Act
        $s = $this->customer->getName();

        // Assert
        $expected = "Jose";
        $this->assertEquals($expected, $s);
    }


    /**
     * @test
     */
    public function statment_Travel_Car_Normal_Go_TreePersons (){

        //Arrange
        $this->addTravel("Paris", Price::CAR,  3);

        // Act
        $s = $this->customer->statement();

        // Assert
        $expected = "Travel by Jose to\n\tParis: 90\n\t-Total: 90\n";
        $this->assertEquals($expected, $s);
    }
    /**
     * @param $city
     * @param $transport
     * @param $persons
     */
    public function addTravel($city, $transport, $persons)
    {
        $this->customer->addTravel(new Travel(new Price($city, $transport), $persons));
    }
}
