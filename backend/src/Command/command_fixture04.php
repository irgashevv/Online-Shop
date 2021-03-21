<?php 

include_once __DIR__ . "/../fixtures/Fixture04.php";
include_once __DIR__ . "/../../../common/src/service/DBConnector.php";

$fixture = new Fixture04(DBConnector::getInstance());
$fixture->run();
die('ok');