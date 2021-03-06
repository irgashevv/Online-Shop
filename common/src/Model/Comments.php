<?php
	
	include_once __DIR__ .'/../Service/DBConnector.php';

class Comments
{
	public $id;
	public $product_id;
	public $username;
	public $email;
	public $avatar;
	public $text;
	public $created;

	private $conn;

	public function __construct(
		$id = null, 
		$product_id = null,
		$username = null,
		$email = null,
		$avatar = null,
		$text = null,
		$created = null) {
	
		$this->conn = DBConnector::getInstance()->connect();
		
		$this->id = $id;
		$this->product_id = $product_id;
		$this->username = $username;
		$this->email = $email;
		$this->avatar = $avatar;
		$this->text = $text;
		$this->created = date('Y-m-d H:i:s', time());
	}


	public function save()
    {
//	    if ($this->id > 0)
//	    {
//	    	$query = "UPDATE news set
//		    title='" . $this->title . "',
//		    preview='" . $this->preview . "',
//		    ". ((!empty($this->picture)) ? "picture='" . $this->picture . "'," : "")
//		    . "content='". $this->content . "',
//		    updated='" . $this->updated . "' where
//		    id=" . $this->id . " limit 1";
//        } else
//            {
//                $query = "INSERT INTO news VALUES (
//                null,
//		        '" . $this->title . "',
//		        '" . $this->picture . "',
//		        '" . $this->preview . "',
//		        '" . $this->content . "',
//		        '" . $this->created . "',
//	        	'" . $this->updated . "')";
//            }
//	$result = mysqli_query($this->conn, $query);
	}

	public function all()
    {
		$result = mysqli_query($this->conn, "select * from comments order by id desc");
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	public function getByProductId($product_id)
    {
		$result = mysqli_query($this->conn, "select * from comments where product_id = $product_id");

		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	public function deleteById($id)
    {
		mysqli_query ($this->conn, "delete from comments where id = $id");
	} 
}