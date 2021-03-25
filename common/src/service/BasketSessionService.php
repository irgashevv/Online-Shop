<?php

include_once __DIR__ . "/../model/Basket.php";
include_once __DIR__ . "/../model/BasketItem.php";
include_once __DIR__ . "/../service/BasketService.php";

class BasketSessionService extends BasketService
{
    public function getBasketProducts($basket_id)
    {
        $session = $_SESSION['basket'] ?? [];
        if (empty($session) && sizeof($session) == 0) {
            return $session;
        }
        return unserialize($session);
    }

    public static function getBasketByUserId($userId)
    {

    }

    public function updateBasketItem($basket_id, $product_id, $qty)
    {

    }

    public function deleteBasketItem($basket_id, $product_id)
    {
        (new BasketItem())->deleteProductByBasketId($product_id, $basket_id);
    }

    public function createBasketItem($basket_id, $product_id, $qty)
    {
        $item =
            [
                'product_id' => $product_id,
                'basket_id' => $basket_id,
                'quantity' => $qty
            ];
        $session = $this->getBasketProducts($basket_id);
        $session[] = $item;
        $_SESSION['basket'] = serialize($session);
    }

    public function clearBasket($basket_id)
    {
        // TODO: Implement clearBasket() method.
    }

    public function getBasketIdByUserId($basket_id)
    {
        // TODO: Implement getBasketIdByUserId() method.
    }
}