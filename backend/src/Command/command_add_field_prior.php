<?php 

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";
include_once __DIR__ . "/../migrations/202101311559_migration_add_field_prior_to_categories.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddFieldPriorToCategory($dbConnector);
$migration->commit();

die('ok');