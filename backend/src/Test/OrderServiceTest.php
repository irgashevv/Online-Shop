<?php

include_once __DIR__ . '/../../../common/src/Service/OrderService.php';
include_once __DIR__ . '/../../../common/src/Model/Order.php';
include_once __DIR__ . '/../../../backend/src/Test/AbstractTest.php';

class OrderServiceTest extends AbstractTest
{
    public function testCalcTotal()
    {
        $this->copyTableByName('products');
        $this->copyTableByName('orders');
        $this->copyTableByName('order_item');

        $orderService = new OrderService();

        $orderObject = new Order();
        $orderObject->setConn($this->conn);

        $quantityAndProducts = $orderObject
            ->getProductsAndOrderByOrderId(75);

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