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
            'delivery' => '1',
            'payment' => '2',
            'comment' => 'Comment'
        ];

        $orderController = new OrderController($this->conn->connect());
        $orderController->create();

        $_POST = [];

        // Drop Test Tables
//        $this->dropTableByName('basket');
//        $this->dropTableByName('basket_item');
//        $this->dropTableByName('user');
//        $this->dropTableByName('products');
    }
}