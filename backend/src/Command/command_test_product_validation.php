<?php

include_once __DIR__ . "/../../../common/src/model/Product.php";
include_once __DIR__ . "/../../../common/src/service/AnnotationHelper.php";
include_once __DIR__ . "/../../../common/src/service/ValidationService.php";

$objReflection = new ReflectionClass('Product');
$properties = $objReflection->getProperties();

foreach ($properties as $property) {
    print_r(ValidationService::validate($property->getDocComment()));
}