<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture04 
{
	private $conn;

	private $data = 
	[
		[
			'id' => 'null',
			'title' => 'Магазин №1',
			'address' =>'Магазин №1'
		],
		[
			'id' => 'null',
			'title' => 'Магазин №2',
			'address' =>'Магазин №2'
		],
		[
			'id' => 'null',
			'title' => 'Магазин №3',
			'address' =>'Магазин №3'
		],
		[
			'id' => 'null',
			'title' => 'Магазин №4',
			'address' =>'Магазин №4'
		],
		[
			'id' => 'null',
			'title' => 'Магазин №5',
			'address' =>'Магазин №5'
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
			$result = mysqli_query($this->conn, "INSERT INTO shops VALUES (
				" . $product['id'] . ",
				'" . $product['title'] . "',
				'" . $product['address'] . "')");
					if (!$result)
					{
						print mysqli_error($this->conn) . PHP_EOL;
					}
		}
	}
}