<?php
	
	include_once __DIR__ . '/../service/DBConnector.php';
	include_once __DIR__ .'/AbstractModel.php';

class Basket extends AbstractModel
{
	public $id;
	public $userId;
	public $items = [];


	public function __construct($userId = null) 
	{
		parent::__construct();

		$this->userId = $userId;
	}

	public function save()
	{
		$query = "INSERT INTO basket VALUES (
            null,
            '" . $this->userId . "')";

		$result = mysqli_query($this->conn, $query);
		if (!$result)
		{
			throw new Exception(mysqli_error($this->conn));
		}
	}

	public function getFromDB()
	{
		$result = mysqli_query($this->conn, "select * from basket where 
            user_id = " . $this->userId . " limit 1");

		$one = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return reset($one);
	}

	public function deleteUserById($userId)
	{
		mysqli_query ($this->conn, "delete from basket where user_id = $userId");
	}
}