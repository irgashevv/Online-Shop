<?php 

include_once __DIR__ . "/../../../backend/src/test/OrderControllerTest.php";

$test = new OrderControllerTest();

$test->testCreate();

die('Success');