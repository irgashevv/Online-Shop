<?php

include_once __DIR__ .'/../Service/DBConnector.php';

class Access
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnector::getInstance()->connect();
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
}