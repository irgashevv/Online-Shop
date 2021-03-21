<?php

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";
include_once __DIR__ . "/../migrations/270220211818_migration_add_user_table.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddUserTable($dbConnector);
$migration->commit();

die('ok');