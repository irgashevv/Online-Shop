<?php 
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddCityToShop 
{
	private $conn;

	public function __construct(DBConnector $connector)
	{
		$this->conn = $connector->connect();
	}

	public function commit()
	{
		$result = mysqli_query($this->conn, "ALTER TABLE shops ADD city VARCHAR(63)");
		
		if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}
	}

	public function rollback() 
	{
		$result = mysqli_query($this->conn, "ALTER TABLE shops DROP COLUMN city");
			
		if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}
	}
}