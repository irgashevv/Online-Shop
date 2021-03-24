<?php

include_once __DIR__ . '/../../../common/src/service/OrderService.php';
include_once __DIR__ . '/../../../common/src/model/Order.php';
include_once __DIR__ . '/../../../backend/src/test/AbstractTest.php';
include_once __DIR__ . '/../../../backend/src/fixtures/Fixture01.php';
include_once __DIR__ . '/../../../backend/src/fixtures/FixtureOrders.php';
include_once __DIR__ . '/../../../backend/src/fixtures/FixtureOrderItems.php';

class OrderServiceTest extends AbstractTest
{
    public function testCalcTotal()
    {
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_item');

//        $this->copyTableByName('products');
//        $this->copyTableByName('orders');
//        $this->copyTableByName('order_item');

        $productFixture = new Fixture01($this->conn);
        $productFixture->run();

        $orderFixture = new FixtureOrders($this->conn);
        $orderFixture->run();

        $orderItemFixture = new FixtureOrderItems($this->conn);
        $orderItemFixture->run();

        $orderService = new OrderService();

        $orderObject = new Order();
        $orderObject->setConn($this->conn->connect());

        $quantityAndProducts = $orderObject
            ->getProductsAndOrderByOrderId(1);

        if (!method_exists($orderService, 'calcTotal')) {
            print "Error: calcTotal() is not exist" . PHP_EOL ;
            die('Test Was Crashed');
        }

        $total = $orderService->calcTotal($quantityAndProducts);

        if (935 !== $total) {
            print "Error: calcTotal() is not correct" . PHP_EOL ;
            die('Test Was Crashed');
        }

        $this->dropTableByName('products');
        $this->dropTableByName('orders');
        $this->dropTableByName('order_item');
    }
}