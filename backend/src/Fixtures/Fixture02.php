<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture02 
{
	private $conn;

	private $data = 
	[
		[
			'id' => 'null',
			'title' => 'Яблоки',
			'groupId' =>'1',
			'parentId' =>'1'
		],
		[
			'id' => 'null',
			'title' => 'Груши',
			'groupId' =>'2',
			'parentId' =>'2'
		],
		[
			'id' => 'null',
			'title' => 'Винограды',
			'groupId' =>'3',
			'parentId' =>'3'
		],
		[
			'id' => 'null',
			'title' => 'Лимоны',
			'groupId' =>'4',
			'parentId' =>'4'
		],
		[
			'id' => 'null',
			'title' => 'Апельсины',
			'groupId' =>'5',
			'parentId' =>'5'
		],
		[
			'id' => 'null',
			'title' => 'Яблоки',
			'groupId' =>'1',
			'parentId' =>'1'
		],
		[
			'id' => 'null',
			'title' => 'Груши',
			'groupId' =>'2',
			'parentId' =>'2'
		],
		[
			'id' => 'null',
			'title' => 'Винограды',
			'groupId' =>'3',
			'parentId' =>'3'
		],
		[
			'id' => 'null',
			'title' => 'Лимоны',
			'groupId' =>'4',
			'parentId' =>'4'
		],
		[
			'id' => 'null',
			'title' => 'Апельсины',
			'groupId' =>'5',
			'parentId' =>'5'
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
			$result = mysqli_query($this->conn, "INSERT INTO categories VALUES (
				" . $product['id'] . ",
				'" . $product['title'] . "',
				'" . $product['groupId'] . "',
				'" . $product['parentId'] . "')");
					if (!$result)
					{
						print mysqli_error($this->conn) . PHP_EOL;
					}
		}
	}
}