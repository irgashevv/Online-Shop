<?php 

include_once __DIR__ . "/../Model/Basket.php";
include_once __DIR__ . "/../Model/BasketItem.php";
include_once __DIR__ . "/../Service/BasketService.php";


class BasketDBService extends BasketService
{

    public static function getBasketByUserId($userId)
    {
        $basket = new Basket($userId);

        if ($basket->getFromDB() == null) {
            $basket->userId = $userId;
            $basket->save();
        }
        return $basket->getFromDB();
    }

    public function	updateBasketItem($basket_id, $product_id, $qty)
    {
        (new BasketItem($basket_id, $product_id, $qty))->update();
    }

    public function	deleteBasketItem($basket_id, $product_id)
    {
        (new BasketItem())->deleteProductByBasketId($product_id, $basket_id);
    }

    public function createBasketItem($basket_id, $product_id, $qty)
    {
        $item = new BasketItem();
        $item->basket_id = $basket_id;
        $item->product_id = $product_id;
        $item->quantity = $qty;

        $item->save();
    }

    public function getBasketProducts($basket_id, $testConn = null)
    {
        if (!empty($testConn)) {
            return (new BasketItem())->setConn($testConn)->getByBasketId($basket_id);
        }
        return (new BasketItem())->getByBasketId($basket_id);
    }

    public function clearBasket($basket_id, $testConn = null)
    {
        (new BasketItem())->setConn($testConn)->clearByBasketById($basket_id);
    }

    public function getBasketIdByUserId($userId, $testConn = null)
    {
        if (!empty($testConn)) {
            return 1;
        }
        return (new Basket($userId))->getFromDB()['id'];
    }
}