<?php

session_start();

$side = 'frontend';

include_once __DIR__ . "/../common/src/service/Router.php";

$router = new Router('frontend');

$router->index();