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
			'group_id' =>'1',
			'parent_id' =>'1'
		],
		[
			'id' => 'null',
			'title' => 'Груши',
			'group_id' =>'2',
			'parent_id' =>'2'
		],
		[
			'id' => 'null',
			'title' => 'Винограды',
			'group_id' =>'3',
			'parent_id' =>'3'
		],
		[
			'id' => 'null',
			'title' => 'Лимоны',
			'group_id' =>'4',
			'parent_id' =>'4'
		],
		[
			'id' => 'null',
			'title' => 'Апельсины',
			'group_id' =>'5',
			'parent_id' =>'5'
		],
		[
			'id' => 'null',
			'title' => 'Яблоки',
			'group_id' =>'1',
			'parent_id' =>'1'
		],
		[
			'id' => 'null',
			'title' => 'Груши',
			'group_id' =>'2',
			'parent_id' =>'2'
		],
		[
			'id' => 'null',
			'title' => 'Винограды',
			'group_id' =>'3',
			'parent_id' =>'3'
		],
		[
			'id' => 'null',
			'title' => 'Лимоны',
			'group_id' =>'4',
			'parent_id' =>'4'
		],
		[
			'id' => 'null',
			'title' => 'Апельсины',
			'group_id' =>'5',
			'parent_id' =>'5'
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
				'" . $product['group_id'] . "',
				'" . $product['parent_id'] . "')");
					if (!$result)
					{
						print mysqli_error($this->conn) . PHP_EOL;
					}
		}
	}
}