<?php 

include_once __DIR__ . "/../../../common/src/service/BasketService.php";
include_once __DIR__ . "/../../../common/src/service/BasketSessionService.php";
include_once __DIR__ . "/../../../common/src/service/BasketDBService.php";
include_once __DIR__ . "/../../../common/src/service/BasketCookieService.php";
include_once __DIR__ . "/../../../common/src/service/UserService.php";
include_once __DIR__ . "/../../../common/src/service/ProductService.php";
include_once __DIR__ . "/../../../common/src/model/BasketItem.php";
include_once __DIR__ . "/../../../common/src/model/Product.php";

class BasketController
{
	public $user;
	public $basket;
	public $items;
	public $basketService;

    /**
     * BasketController constructor.
     * @throws Exception
     */
	public function __construct() 
	{
		$this->user = UserService::getCurrentUser();
		if (!isset($this->user['login'])){
		    throw new Exception('No Permission',403 );
        }
		$this->basket = BasketDBService::getBasketByUserId($this->user['id']);
		$this->basketService = new BasketDBService();
//		    $this->basketService = new BasketSessionService();
//          $this->basketService = new BasketCookieService();
		$this->items = BasketDBService::defineBasketDetails();
	}

	public function addProduct()
	{
		$product_id = (int)$_POST['product_id'];
		$qty = (int)$_POST['quantity'];
		if (empty($product_id) || empty($qty))
		{
			throw new Exception("Empty product");
		}

		foreach ($this->items as $item) {
			if ($item['product_id'] == $product_id)
			{
                $this->basketService->updateBasketItem($this->basket['id'],$product_id,$item['quantity']+$qty);
				$this->redirectToBasket();
				die();
			}
		}
		$this->basketService->createBasketItem($this->basket['id'], $product_id, $qty);
		$this->redirectToBasket();
	}

	public function view()
	{
		$result = (new ProductService())->getBasketItems($this->items);
		$items = $result['items'];
		$total = $result['total'];
		include_once __DIR__ . "/../../views/basket/view.php";
	}

	public function delete()
	{
		$this->basketService->deleteBasketItem((int)$this->basket['id'], (int)$_POST['product_id']);
		$this->redirectToBasket();
	}
	
	public function change()
	{
		$this->basketService->updateBasketItem((int)$this->basket['id'], (int)$_POST['product_id'], (int)$_POST['qty']);

		$this->redirectToBasket();
		var_dump($this->basket['id']);
		die();
	}

	public function redirectToBasket()
	{
		header("location: /?model=basket&action=view");
	}
}

