<?php 

include_once __DIR__ . "/../fixtures/Fixture01.php";
include_once __DIR__ . "/../../../common/src/service/DBConnector.php";

$fixture = new Fixture01(DBConnector::getInstance());
$fixture->run();
die('ok');