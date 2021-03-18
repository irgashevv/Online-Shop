<?php

include_once __DIR__ . "/../../../common/src/Model/Rating.php";

$objReflection = new ReflectionClass('Rating');

$properties = $objReflection->getProperties();

print_r($properties); 