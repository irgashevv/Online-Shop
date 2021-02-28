<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Service/SecurityService.php";

abstract class AbstractController implements ControllerInterface
{
    public function __construct()
    {
        if (!SecurityService::isAuthorized()) {
            header("Location: /index.php?model=site&action=login");
            die();
        }
    }
}