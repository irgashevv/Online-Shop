<?php

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";
include_once __DIR__ . "/../migrations/202101311706_migration_add_field_category_to_product.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddFieldCategoryToProduct($dbConnector);
$migration->commit();

die('ok');