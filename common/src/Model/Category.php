<?php

class Category
{
	public $id;
	public $title;
	public $groupId;
	public $parentId;

	private $conn;

	public function __construct(
		$id = null, 
		$title = null, 
		$groupId = null, 
		$parentId = null) {

		$this->conn = mysqli_connect("localhost", "shop_user", "shop_password", "db_shop");

		$this->id = $id;
		$this->title = $title;
		$this->groupId = $groupId;
		$this->parentId = $parentId;
	}
	public function save()
    {
		if ($this->id > 0)
		{
			$query = "UPDATE categories set 
			title='" . $this->title . "',
			groupId='" . $this->groupId . "',
			parentId='" . $this->parentId . "'
			where id=" . $this->id . " limit 1";
        } else
            {
		        $query = "INSERT INTO categories VALUES (
                null,
		        '" . $this->title . "',
		        '" . $this->groupId . "',
		        '" . $this->parentId . "')";
            }

	$result = mysqli_query($this->conn, $query);
	}
	public function all()
        {
	    	$result = mysqli_query($this->conn, "select * from categories order by id desc");
	    	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	    }

	public function getById($id)
    {
		$result = mysqli_query($this->conn, "select * from categories where id = $id ");
		$one = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		return reset($one);
	}

	public function deleteById($id)
    {
		mysqli_query ($this->conn, "delete from categories where id = $id");
	} 
}