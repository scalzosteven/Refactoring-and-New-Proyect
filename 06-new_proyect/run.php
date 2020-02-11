<?php
namespace Refactoring;
require 'vendor/autoload.php';


// define customer
$customer = new usuarios\CustomerToTravel('Carlos');
$city = 'Londres';
$price = new usuarios\Price($city, 2);
$travel = new usuarios\Travel($price, 1);

//$travel = new Travel(new Price($city, 2), 2);
$customer->addTravel($travel);
$s = $customer->getPrice($customer->_travels);

$db = new usuarios\DbAction($price, $city);
//$db->set($customer->getPrice($customer->_travels), $city);
$db->set($customer->getName(), $customer->getPrice($customer->_travels), $city );


$city = 'Milan';
$price = new usuarios\Price($city, 3);
$travel = new usuarios\Travel($price, 3);
$customer->addTravel($travel);
$db = new usuarios\DbAction($price, $city);
// $db->set($customer->getPrice($customer->_travels), $city);
$db->set($customer->getName(), $customer->getPrice($customer->_travels), $city);


// print the statement
echo $customer->statement();