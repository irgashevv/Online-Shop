<?php

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";
include_once __DIR__ . "/../migrations/202103051935_migration_add_category_group.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddCategoryGroup($dbConnector);
$migration->rollback();

die('ok');