<?php 

include_once __DIR__ . "/../Fixtures/Fixture02.php";

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$fixture = new Fixture02(DBConnector::getInstance());
$fixture->run();
die('ok');