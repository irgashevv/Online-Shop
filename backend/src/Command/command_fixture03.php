<?php 

include_once __DIR__ . "/../fixtures/Fixture03.php";
include_once __DIR__ . "/../../../common/src/service/DBConnector.php";

$fixture = new Fixture03(DBConnector::getInstance());
$fixture->run();
die('ok');