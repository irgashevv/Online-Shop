<?php 

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";
include_once __DIR__ . "/../../../common/src/service/ImportService.php";

(new ImportService())->import();

die('ok');