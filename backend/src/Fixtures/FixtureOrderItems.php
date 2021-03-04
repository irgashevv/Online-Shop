<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureOrderItems
{
	private $conn;

	private $data = 
	[
		[ 'id' => '1', 'order_id' => '1', 'product_id' => '101', 'quantity' => '1' ],
		[ 'id' => '2', 'order_id' => '1', 'product_id' => '1', 'quantity' => '4' ],
		[ 'id' => '3', 'order_id' => '1', 'product_id' => '103', 'quantity' => '3' ],
		[ 'id' => '4', 'order_id' => '1', 'product_id' => '1', 'quantity' => '2' ],
		[ 'id' => '5', 'order_id' => '1', 'product_id' => '105', 'quantity' => '5' ],
	];

	public function __construct(DBConnector $conn)
	{
		$this->conn = $conn->connect();
	}

	public function run()
	{
		foreach ($this->data as $product) 
		{
			$result = mysqli_query($this->conn, "INSERT INTO order_item VALUES (
				" . $product['id'] . ",
				'" . $product['order_id'] . "',
				'" . $product['product_id'] . "',
				'" . $product['quantity'] . "')");
					if (!$result)
					{
						print mysqli_error($this->conn) . PHP_EOL;
					}
		}
	}
}