<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";
include_once __DIR__ . "/../Migrations/202101311550_migration_add_field_city_to_shop.php";

$dbConnector = DBConnector::getInstance();
$migration = new MigrationAddCityToShop($dbConnector);
$migration->rollback();

die('ok');