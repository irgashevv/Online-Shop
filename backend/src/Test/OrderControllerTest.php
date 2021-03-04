<?php

include_once __DIR__ . '/../../../backend/src/Test/AbstractTest.php';
include_once __DIR__ . '/../../../backend/src/Fixtures/FixtureBasket.php';
include_once __DIR__ . '/../../../backend/src/Fixtures/FixtureBasketItem.php';
include_once __DIR__ . '/../../../frontend/src/Controller/OrderController.php';

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

        // Add Products to Basket
        // Create Tables for Basket
        $this->createTableByName('basket');
        $this->createTableByName('basket_item');
        $this->createTableByName('user');
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_item');

        $this->copyTableByName('user');
        $this->copyTableByName('products');



        // Run Migrations for Basket and BasketItem
        (new FixtureBasket($this->conn))->run();
        (new FixtureBasketItem($this->conn))->run();

        // Submit Order Form
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


        // Check Exists Order in DB

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

        // Drop Test Tables
        $this->dropTableByName('basket');
        $this->dropTableByName('basket_item');
        $this->dropTableByName('user');
        $this->dropTableByName('products');
        $this->dropTableByName('orders');
        $this->dropTableByName('order_item');
    }
}