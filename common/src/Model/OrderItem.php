<?php
	include_once __DIR__ .'/../Service/DBConnector.php';

class OrderItem
{
	public $order_id;
	public $product_id;
	public $quantity;

	private $conn;

	public function __construct(
		$order_id = null,
		$product_id = null, 
		$quantity = null) 
	{
		$this->conn = DBConnector::getInstance()->connect();
		$this->order_id = $order_id;
		$this->product_id = $product_id;
		$this->quantity = $quantity;
	}


	public function save()
	{
		
		$query = "INSERT INTO order_item VALUES (
            null,
            '" . $this->order_id . "',
            '" . $this->product_id . "',
            '" . $this->quantity . "')";

		$result = mysqli_query($this->conn, $query);

		if (!$result)
		{
			throw new Exception(mysqli_error($this->conn));
		}

	}

	public function update()
	{
		if (empty($this->order_id) || empty($this->product_id) || empty($this->quantity))
		{
			throw new Exception("Empty Order Item Field ");
		}

		$query = "UPDATE order_item SET 
            quantity=". $this->quantity . " WHERE
            order_id = " . $this->order_id . " AND
            product_id = " . $this->product_id . " limit 1" ;

		$result = mysqli_query($this->conn, $query);

		if (!$result)
		{
			throw new Exception(mysqli_error($this->conn));
		}
	}

	public function getByOrderId($order_id)
	{
		$result = mysqli_query($this->conn, "SELECT * FROM order_item WHERE 
            order_id = $order_id ");

		$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $items;
	}

	public function deleteProductByOrderId($product_id, $order_id)
	{
		mysqli_query ($this->conn, "DELETE FROM order_item WHERE
            product_id = $product_id AND
            order_id = $order_id limit 1");
	}

	public function clearByOrderById($order_id)
	{
		mysqli_query ($this->conn, "DELETE FROM order_item WHERE order_id = $order_id");
	}
}