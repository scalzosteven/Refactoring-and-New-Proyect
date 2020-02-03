<?php
require 'vendor/autoload.php';

// define customer
$customer = new Refactoring\CustomerToTravel('Steven');
// choose movie to be rented, define rental, add it to the customer
$price = new Refactoring\Price('Paris', 2);
$travel = new Refactoring\Travel($price, 3);
$customer->addTravel($travel);
// choose 2nd movie to be rented, define rental, add it to the customer
$price = new Refactoring\Price('Roma', 1);
$travel = new Refactoring\Travel($price, 2);
$customer->addTravel($travel);
// print the statement
echo $customer->statement();