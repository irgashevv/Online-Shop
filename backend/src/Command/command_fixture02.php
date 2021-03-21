<?php 

include_once __DIR__ . "/../fixtures/Fixture02.php";
include_once __DIR__ . "/../../../common/src/service/DBConnector.php";

$fixture = new Fixture02(DBConnector::getInstance());
$fixture->run();
die('ok');