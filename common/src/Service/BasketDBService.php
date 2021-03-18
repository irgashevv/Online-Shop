<?php 

include_once __DIR__ . "/../Model/Basket.php";
include_once __DIR__ . "/../Model/BasketItem.php";
include_once __DIR__ . "/BasketService.php";


class BasketDBService extends BasketService
{
    const TEST_USER_ID = 1;
    private $conn;

    public function __construct($conn = null)
    {
        $this->conn = $conn;
    }

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

    public function getBasketProducts($basket_id)
    {
        if (!empty($this->conn)) {
            return (new BasketItem())->setConn($this->conn)->getByBasketId($basket_id);
        }
        return (new BasketItem())->getByBasketId($basket_id);
    }

    public function clearBasket($basket_id)
    {
        if (!empty($this->conn)) {
            (new BasketItem())->setConn($this->conn)->clearByBasketById($basket_id);
        }
        (new BasketItem())->clearByBasketById($basket_id);
    }

    public function getBasketIdByUserId($userId)
    {
        if (!empty($this->conn)) {
            return self::TEST_USER_ID;
        }
        return (new Basket($userId))->getFromDB()['id'];
    }

    public static function defineBasketDetails()
    {

        $user = UserService::getCurrentUser();

        if (!isset($user['login'])){
            throw new Exception('No Permission',403 );
        }

        $basket = self::getBasketByUserId($user['id']);
//		    $basketService = new BasketSessionService();
//          $basketService = new BasketCookieService();
        return (new BasketDBService())->getBasketProducts((int)$basket['id']);
    }
}