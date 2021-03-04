<?php

include_once __DIR__ . '/../../../common/src/Service/OrderService.php';
include_once __DIR__ . '/../../../common/src/Model/Order.php';

class OrderServiceTest
{
    public function __construct()
    {
        self::testCalcTotal();
    }

    public static function testCalcTotal()
    {
        $orderService = new OrderService();

        $quantityAndProducts = (new Order())->getProductsAndOrderByOrderId(75);

        if (!method_exists($orderService, 'calcTotal')) {
            print "Error: calcTotal() is not exist" . PHP_EOL ;
            die('Test Was Crashed');
        }

        $total = $orderService->calcTotal($quantityAndProducts);
        if (390 !== $total) {
            print "Error: calcTotal() is not correct" . PHP_EOL ;
            die('Test Was Crashed');
        }
    }
}