<?php 

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";
include_once __DIR__ . "/../../../common/src/service/ExportService.php";

(new ExportService())->export();

die('ok');