<?php 

interface BasketInterface
{
	public static function getBasketByUserId($userId);

	public function	updateBasketItem($basket_id, $product_id, $qty);
	
	public function	deleteBasketItem($basket_id, $product_id);
	
	public function createBasketItem($basket_id, $product_id, $qty);
	
	public function getBasketProducts($basket_id);

	public function clearBasket($basket_id);

	public function getBasketIdByUserId($basket_id);
}