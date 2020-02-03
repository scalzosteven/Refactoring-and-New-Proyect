<?php
namespace Refactoring;
class TravelTest extends \PHPUnit_Framework_TestCase
{
    public $customer;

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
    public function get_price_4_person_by_airplane (){

        $travel[] = new Travel(new Price("Londres", Price::AIRPLANE), 4);
        // Act
        $s = $this->customer->getPrice($travel);

        // Assert
        $expected = "400";
        $this->assertEquals($expected, $s);
    }

    /**
     * @test
     */
    public function get_price_5_person_by_train (){

        $travel[] = new Travel(new Price("Roma", Price::TRAIN), 5);
        // Act
        $s = $this->customer->getPrice($travel);

        // Assert
        $expected = "250";
        $this->assertEquals($expected, $s);
    }

    /**
     * @test
     */
    public function get_price_2_person_by_bus (){

        $travel[] = new Travel(new Price("Roma", Price::BUS), 2);
        // Act
        $s = $this->customer->getPrice($travel);

        // Assert
        $expected = "40";
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


    public function setUp()
    {
        $this->customer = new CustomerToTravel("Jose");
    }

    public function addTravel($city, $transport, $persons)
    {
        $this->customer->addTravel(new Travel(new Price($city, $transport), $persons));
    }
}
