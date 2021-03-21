<?php

include_once __DIR__ . "/../model/Basket.php";
include_once __DIR__ . "/../model/BasketItem.php";
include_once __DIR__ . "/interfaces/BasketInterface.php";
include_once __DIR__ . "/../service/BasketService.php";

class BasketCookieService extends BasketService
{
    const TIME_EXPIRED = 3600;

    /**
     * @param $basket_id
     * @return array
     */
    public function getBasketProducts($basket_id)
    {
        $data = $_COOKIE['basket'] ?? [];
        if (empty($data) && sizeof($data) == 0)
        {
            return $data;
        }
        return unserialize($data);
    }

    public static function getBasketByUserId($userId)
    {

    }

    public function updateBasketItem($basket_id, $product_id, $qty)
    {
        $data = $this->getBasketProducts($basket_id);

        foreach ($data as $key => $item)
        {
            if ($item['product_id'] === $product_id)
            {
                $data[$key]['quantity'] = $qty;
            }
        }
        $this->save($data);
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
        $data = $this->getBasketProducts($basket_id);
        $data[] = $item;

        $this->save($data);
    }

    public function save($data)
    {
        //log()
        setcookie('basket', serialize($data), time() + self::TIME_EXPIRED);
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