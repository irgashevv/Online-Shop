<?php 

class DBConnector
{
	private $connect;
	private static $instance;

	public function __construct(
	    $host = "localhost",
        $user = "shop_user",
        $password = "shop_password",
        $db = "db_shop"
    )
	{
		$this->connect = mysqli_connect(
		    $host,
            $user,
            $password,
            $db);
	}

	public function connect()
	{
		return $this->connect;
	}

	public static function getInstance()
	{
		if (empty((self::$instance))) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}