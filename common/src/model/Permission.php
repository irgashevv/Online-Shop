<?php

include_once __DIR__ . '/../service/DBConnector.php';

class Permission
{
	public $permission;
	private $conn;

	public function __construct($permission = null)
    {
		$this->conn       = DBConnector::getInstance()->connect();
		$this->permission = $permission;
	}


	public function save()
    {
        $query = "INSERT INTO rbac_permission VALUES ('" . $this->permission . "')";

	    $result = mysqli_query($this->conn, $query);
	    if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
	}

    /**
     * @param $name
     * @throws Exception
     */
	public function deleteByName($name)
    {
        $query = "DELETE FROM rbac_permission WHERE permission = '$name'";

	    $result = mysqli_query($this->conn, $query);
	    if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
	}

	public function all()
    {
        $permissions = [];

        $result = mysqli_query($this->conn, "select * from rbac_permission");

		foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
		    $permissions[] = $item['permission'];
        }
		return $permissions;
	}
}