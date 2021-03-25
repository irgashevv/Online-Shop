<?php
include_once __DIR__ . '/../service/DBConnector.php';

class BasketItem
{
    public $basket_id;
    public $product_id;
    public $quantity;

    private $conn;

    public function __construct(
        $basket_id  = null,
        $product_id = null,
        $quantity   = null)
    {
        $this->conn = DBConnector::getInstance()->connect();
        $this->basket_id    = $basket_id;
        $this->product_id   = $product_id;
        $this->quantity     = $quantity;
    }

    public function setConn($testConn)
    {
        $this->conn = $testConn;

        return $this;
    }

    public function save()
    {
        $query = "INSERT INTO basket_item VALUES (
            null,
            '" . $this->basket_id . "', 
            '" . $this->product_id . "', 
            '" . $this->quantity . "'
        )";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function update()
    {
        if (empty($this->basket_id) || empty($this->product_id) || empty($this->quantity)) {
            throw new Exception("Empty Basket Item Field ");
        }

        $query = "UPDATE basket_item SET 
        quantity=" . $this->quantity . " WHERE 
        basket_id = " . $this->basket_id . " AND 
        product_id = " . $this->product_id . " limit 1";

        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function getByBasketId($basket_id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM basket_item WHERE 
            basket_id = $basket_id");

        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $items;
    }

    public function deleteProductByBasketId($product_id, $basket_id)
    {
        mysqli_query($this->conn, "DELETE FROM basket_item WHERE 
            product_id = $product_id AND 
            basket_id = $basket_id limit 1");
    }

    public function clearByBasketById($basket_id)
    {
        mysqli_query($this->conn, "DELETE FROM basket_item WHERE
            basket_id = $basket_id");
    }
}