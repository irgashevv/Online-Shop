<?php 

include_once __DIR__ . "/../../../backend/src/Test/OrderControllerTest.php";

$test = new OrderControllerTest();

$test->testCreate();

die('Success');