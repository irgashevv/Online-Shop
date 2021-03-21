<?php

include_once __DIR__ . "/../../../common/src/service/DBConnector.php";

class FixtureBasketItem
{
	private $conn;

	private $data = 
	[
		[ 'id' => '1', 'basket_id' => '1', 'product_id' => '47', 'quantity' => '4'],
		[ 'id' => '2', 'basket_id' => '1', 'product_id' => '49', 'quantity' => '3'],
		[ 'id' => '3', 'basket_id' => '1', 'product_id' => '51', 'quantity' => '1'],
	];

	public function __construct(DBConnector $conn)
	{
		$this->conn = $conn->connect();
	}

	public function run()
	{
		foreach ($this->data as $product) 
		{
			$result = mysqli_query($this->conn, " INSERT INTO basket_item VALUES (
				" . $product['id'] . ",
				'" . $product['basket_id'] . "',
				'" . $product['product_id'] . "',
				'" . $product['quantity'] . "
				')");

					if (!$result)
					{
						print mysqli_error($this->conn) . PHP_EOL;
					}
		}
	}
}