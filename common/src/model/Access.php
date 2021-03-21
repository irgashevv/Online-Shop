<?php

include_once __DIR__ . '/../service/DBConnector.php';

class Access
{
    public $access;
    private $conn;

    public function __construct($access = null)
    {
        $this->access = $access;
        $this->conn = DBConnector::getInstance()->connect();
    }

    public function saveAccess()
    {
        $query = "INSERT INTO `rbac_role` VALUES ('" . $this->access . "')";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function createAll(array $data = [])
    {
        if (empty($data)) {
            throw new Exception('Empty Access Data');
        }

        $accesses = [];
        foreach ($data as $role => $perms) {
            foreach ($perms as $perm => $value) {
                if ($value === 'on') $accesses[] = sprintf("('%s', '%s')", $role, $perm);
            }
        }
        if (empty($accesses)) {
            throw new Exception('Empty Data for Access Insert');
        }
        $query = "insert into rbac_access values " . implode(',', $accesses);
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
        return true;
    }

    public function clear()
    {
        $result = mysqli_query($this->conn, "truncate table rbac_access");
        if (!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
        return true;
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "select * from rbac_access");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllRoles()
    {
        $result = mysqli_query($this->conn, "select * from rbac_role");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    public function deleteByName($name)
    {
        $query = "DELETE FROM rbac_role WHERE `role` = '$name'";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }
}