<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202103051935_migration_add_category_group.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddCategoryGroup($dbConnector);
$migration->rollback();

die('ok');