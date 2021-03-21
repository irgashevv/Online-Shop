<?php 

include_once __DIR__ . "/interfaces/BasketInterface.php";

abstract class BasketService implements BasketInterface
{
	abstract public static function getBasketByUserId($userId);

	abstract public function	updateBasketItem($basket_id, $product_id, $qty);

	abstract public function    deleteBasketItem($basket_id, $product_id);

	abstract public function createBasketItem($basket_id, $product_id, $qty);

	abstract public function getBasketProducts($basket_id);

	abstract public function clearBasket($basket_id);

	abstract public function getBasketIdByUserId($basket_id);

}