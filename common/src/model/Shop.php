<?php
	
	include_once __DIR__ . '/../service/DBConnector.php';

class Shop
{
	public $id;
	public $title;
	public $address;

	private $conn;

	public function __construct(
		$id = null, 
		$title = null, 
		$address = null)
    {
		$this->conn = DBConnector::getInstance()->connect();
		
		$this->id = $id;
		$this->title = $title;
		$this->address = $address;
	}

	public function save()
    {
	    if ($this->id > 0)
	    {
		    $query = "UPDATE shops set 
	    	title='" . $this->title . "',
		    address='" . $this->address . "' where
		    id=" . $this->id . " limit 1";
        } else
            {
		        $query = "INSERT INTO shops VALUES (
                null,
		        '" . $this->title . "',
		        '" . $this->address . "')";
            }
	$result = mysqli_query($this->conn, $query);
	}

	public function all()
    {
		$result = mysqli_query($this->conn, "select * from shops order by id desc");
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	public function getById($id)
    {
		$result = mysqli_query($this->conn, "select * from shops where id=$id ");
		$one = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		return reset($one);
	}

	public function deleteById($id)
    {
		mysqli_query ($this->conn, "delete from shops where id = $id");
	} 
}