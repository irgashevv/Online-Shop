<?php

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";
include_once __DIR__ . "/../migrations/280220211506_migration_add_rbac.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddRbac($dbConnector);
$migration->commit();

die('ok');