<?php
require 'vendor/autoload.php';

// define customer
$customer = new Refactoring\CustomerToTravel('Steven');
$city = 'Paris';
// choose movie to be rented, define rental, add it to the customer
$price = new Refactoring\Price($city, 2);
$travel = new Refactoring\Travel($price, 3);
$customer->addTravel($travel);
$db = new Refactoring\Travels\addTravelesToDb($price, $city);
$db->set($customer->getPrice($travel), $city);

// choose 2nd movie to be rented, define rental, add it to the customer
$city = 'Roma';
$price = new Refactoring\Price($city, 1);
$travel = new Refactoring\Travel($price, 2);
$customer->addTravel($travel);
$db = new Refactoring\Travels\addTravelesToDb($price, $city);
$db->set($customer->getPrice($travel), $city);


// print the statement
echo $customer->statement();