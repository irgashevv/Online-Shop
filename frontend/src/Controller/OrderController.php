<?php

include_once __DIR__ . "/../../../common/src/Service/OrderService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Service/BasketCookieService.php";
include_once __DIR__ . "/../../../common/src/Service/BasketDBService.php";
include_once __DIR__ . "/../../../common/src/Model/Order.php";
include_once __DIR__ . "/../../../common/src/Model/OrderItem.php";


class OrderController
{
    private $basketService;

    public function __construct()
    {
        // TODO Check BasketService with OrderController
        $this->basketService = new BasketDBService();
//        $this->basketService = new BasketCookieService();
    }

    public function index()
    {
        include_once __DIR__ . "/../../view/order/form.php";
    }

    public function create()
    {
        $name = htmlspecialchars($_POST['name']);
        // TODO Validation Phone
        $phone = htmlspecialchars($_POST['phone']);
        // TODO Validation Email
        $email = htmlspecialchars($_POST['email']);
        $delivery = (int)$_POST['delivery_id'];
        $payment = (int)$_POST['payment_id'];
        $comment = htmlspecialchars($_POST['comment']);
        $userId = UserService::getCurrentUser()['id'] ?? 0;
        $total = 0;
        $status = OrderService::STATUS_NEW;
        $updated = date('Y-m-d H:i:s', time());

        $order = new Order(
            null,
            $userId,
            $payment,
            $delivery,
            $total,
            $comment,
            $name,
            $phone,
            $email,
            $status,
            $updated
        );

        $orderId = $order->save();
            if (empty($orderId))
            {
                throw new Exception("Order ID is null", 400);
            }

        $basketId = $this->basketService->getBasketIdByUserId($userId);
        $items = $this->basketService->getBasketProducts($basketId);
            if (empty($items))
            {
                throw new Exception("Basket is Empty", 400);
            }
            foreach ($items as $item)
            {
                $orderItem = new OrderItem($orderId, (int)$item['product_id'], (int)$item['quantity']);
                $orderItem->save();
            }

            // Clear Basket
        $this->basketService->clearBasket($basketId);


            header("location: /index.php?model=order&action=success&order_id=" . $orderId);
    }

    public  function  success()
    {
        $orderId = (int)$_GET['order_id'];

        include_once __DIR__ . "/../../view/Order/success.php";
    }
}