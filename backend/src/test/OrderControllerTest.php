<?php

include_once __DIR__ . '/../../../backend/src/test/AbstractTest.php';
include_once __DIR__ . '/../../../backend/src/fixtures/FixtureBasket.php';
include_once __DIR__ . '/../../../backend/src/fixtures/FixtureBasketItem.php';
include_once __DIR__ . '/../../../frontend/src/controller/OrderController.php';

class OrderControllerTest extends AbstractTest
{
    public function testCreate()
    {
        try {
            $this->dropTableByName('basket');
            $this->dropTableByName('basket_item');
            $this->dropTableByName('user');
            $this->dropTableByName('products');
            $this->dropTableByName('orders');
            $this->dropTableByName('order_item');
        } catch (Exception $e) {}

        $this->createTableByName('basket');
        $this->createTableByName('basket_item');
        $this->createTableByName('user');
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_item');

        $this->copyTableByName('user');
        $this->copyTableByName('products');

        (new FixtureBasket($this->conn))->run();
        (new FixtureBasketItem($this->conn))->run();

        $_POST = [
            'name' => 'Ибра',
            'phone' => '123-123',
            'email' => 'irg@mail.ru',
            'delivery' => '2',
            'payment' => '2',
            'comment' => 'Comment'
        ];

        $orderController = new OrderController($this->conn->connect());
        $orderController->create();

        $orders = (new Order())->setConn($this->conn->connect())->all();


        if (sizeof($orders) !== 1) {
            print "Error: wrong Orders count" . PHP_EOL;
            die('Test Was Crashed');
        }

        $order = reset ($orders);
        foreach (['email' => $_POST['email'], 'phone' => $_POST['phone']] as $key => $value) {
            if ($order[$key] !== $value) {
                print "Error: wrong value". $key . PHP_EOL;
                die('Test Was Crashed');
            }
        }

        $orderItems = (new OrderItem())->setConn($this->conn->connect())->getByOrderId($order['id']);

        if (sizeof($orderItems) !== 3) {
            print "Error: wrong Order_items count" . PHP_EOL;
            die('Test Was Crashed');
        }

        foreach ($orderItems as $orderItem) {

            if (!in_array($orderItem['product_id'], [47, 49, 51])) {
                print "Error: wrong Order_items id = " . $orderItem['product_id'] . PHP_EOL;
                die('Test Was Crashed');
            }

        }

        $_POST = [];

        $this->dropTableByName('basket');
        $this->dropTableByName('basket_item');
        $this->dropTableByName('user');
        $this->dropTableByName('products');
        $this->dropTableByName('orders');
        $this->dropTableByName('order_item');
    }
}