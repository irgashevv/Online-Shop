<?php 

include_once __DIR__ . "/../../../backend/src/test/OrderServiceTest.php";

$test = new OrderServiceTest();

$test->testCalcTotal();

die('Success');