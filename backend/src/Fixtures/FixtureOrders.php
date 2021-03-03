<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureOrders
{
	private $conn;

	private $data = 
	[
		[
			'id' => '1',
			'user_id' => '1',
			'total' =>'0',
			'payment_id' =>'1',
			'delivery_id' =>'1',
			'comment' =>'vv',
			'name' =>'aa',
			'phone' =>'123',
			'email' =>'11@mail.ru',
			'status' =>'1',
			'created' =>'2020-01-22 12:32:02',
			'updated' =>'2020-01-22 12:33:02'
		],
		[
			'id' => '2 ',
			'user_id' => '1',
			'total' =>'0',
			'payment_id' =>'1',
			'delivery_id' =>'1',
			'comment' =>'vv',
			'name' =>'aa',
			'phone' =>'123',
			'email' =>'11@mail.ru',
			'status' =>'1',
            'created' =>'2020-01-22 12:32:02',
            'updated' =>'2020-01-22 12:33:02'
		],

	];

	public function __construct(DBConnector $conn)
	{
		$this->conn = $conn->connect();
	}

	public function run()
	{
		foreach ($this->data as $product) 
		{
			$result = mysqli_query($this->conn, "INSERT INTO orders VALUES (
				" . $product['id'] . ",
				'" . $product['user_id'] . "',
				'" . $product['total'] . "',
				'" . $product['payment_id'] . "',
				'" . $product['delivery_id'] . "',
				'" . $product['comment'] . "',
				'" . $product['name'] . "',
				'" . $product['phone'] . "',
				'" . $product['email'] . "',
				'" . $product['status'] . "',
				'" . $product['created'] . "',
				'" . $product['updated'] . "')");
					if (!$result)
					{
						print mysqli_error($this->conn) . PHP_EOL;
					}
		}
	}
}