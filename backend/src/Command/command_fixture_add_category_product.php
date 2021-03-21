<?php 

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";
include_once __DIR__ . "/../fixtures/FixtureCategoryProduct.php";

$dbConnector = DBConnector::getInstance();
$fixture = new FixtureCategoryProduct($dbConnector);
$fixture->run();

die('ok');