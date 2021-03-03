<?php 

include_once __DIR__ . "/../../../backend/src/Test/OrderServiceTest.php";

$test = new OrderServiceTest();

$test->testCalcTotal();
die('Success');