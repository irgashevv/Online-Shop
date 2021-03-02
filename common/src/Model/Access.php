<?php

include_once __DIR__ .'/../Service/DBConnector.php';

class Access
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnector::getInstance()->connect();
    }

    public function getFromDB()
    {
        $result = mysqli_query($this->conn, "select * from rbac_access");

        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }
}