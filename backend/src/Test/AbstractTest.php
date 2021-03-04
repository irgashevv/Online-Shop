<?php


abstract class AbstractTest
{
    protected $conn;

    const DB__PRODUCT_NAME = 'db_shop';
    const DB_TEST_NAME = 'shop_test';

    public function __construct()
    {
        $this->conn = (new  DBConnector(
            'localhost',
            'shop_test_user',
            'shop_test_password',
            'shop_test'))->connect();
    }

    public function copyTableByName($name)
    {
        $query = "show create table " . self::DB__PRODUCT_NAME . "." . $name;

        $result = mysqli_query($this->conn, $query);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

//        print_r($result[0]['Create Table']);

        mysqli_query($this->conn, $result[0]['Create Table']);
        mysqli_query($this->conn, "truncate table " . self::DB_TEST_NAME . "." . $name);

        mysqli_query($this->conn, "insert into " . self::DB_TEST_NAME . "." . $name
        . " select * from " . self::DB__PRODUCT_NAME . "." . $name);

    }
}