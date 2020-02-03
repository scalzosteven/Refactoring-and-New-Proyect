<?php

require_once('src/Travel/CustomerToTravel.php');
require_once('src/Travel/Travel.php');
require_once('src/Travel/Price.php');

// define customer
$customer = new CustomerToTravel('Steven');
// choose movie to be rented, define rental, add it to the customer
$travel = new Travel('Paris', 0);
$price = new Price($travel, 3);
$customer->addTravel($price);
// choose 2nd movie to be rented, define rental, add it to the customer
$travel = new Travel('Roma', 1);
$price = new Price($travel, 2);
$customer->addTravel($price);
// print the statement
echo $customer->statement();