<?php

include_once __DIR__ . "/interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/service/SecurityService.php";
include_once __DIR__ . "/../../../common/src/service/UserService.php";
include_once __DIR__ . "/../../../common/src/model/User.php";

abstract class AbstractController implements ControllerInterface
{
    /**
     * AbstractController constructor.
     * @throws Exception
     */
    public function __construct()
    {
        if (!SecurityService::isAuthorized()) {
            header("Location: /?model=site&action=login");
            die();
        }

        $currentUser = UserService::getCurrentUser();

        $model = htmlspecialchars($_GET['model']);
        $action = htmlspecialchars($_GET['action']);
        (new User())->isAccess($currentUser['role'], $model, $action);
    }
}