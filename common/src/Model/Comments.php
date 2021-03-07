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
		$text = null
    )
    {
	
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
        $query = "INSERT into comments VALUES (
            null,
            '" . $this->product_id . "',
            '" . $this->username . "',
            '" . $this->email . "',
            '" . $this->avatar . "',
            '" . $this->text . "',
            '" . $this->created . "'
            )";

	    	$result = mysqli_query($this->conn, $query);

	    	if (!$result) {
	    	    throw new Exception(mysqli_error($this->conn), 400);
            }
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