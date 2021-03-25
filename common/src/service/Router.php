<?php

include_once __DIR__ . "/ExceptionService.php";

class Router
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function index()
    {
        global $side;

        try {
            $module = $_GET['module'] ?? '';
            if (!empty($module)) $module = $module . '/';
            $model = $_GET['model'] ?? 'site';
            $model = htmlspecialchars($model);
            $model = ucfirst($model);
            $controller = $model . 'controller';
            if (!file_exists(__DIR__ . "/../../../" . $this->side . "/src/controller/" . $module . $controller . '.php')) {
                throw new Exception("Controller Not Found", 404);
            }
            include_once __DIR__ . "/../../../" . $this->side . "/src/controller/" . $module . $controller . '.php';
            $action = $_GET['action'] ?? 'index';
            $action = htmlspecialchars($action);

            if (isset($action)) {
                $objController = new $controller();
                if (method_exists($objController, $action)) {
                    return $objController->$action();
                }
                throw new Exception('Action Not Found', 404);
            }
        } catch (Exception $e) {
            ExceptionService::error($e, $side);
        }
    }
}