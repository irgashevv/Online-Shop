<?php

include_once __DIR__ . "/../../../common/src/model/Product.php";
include_once __DIR__ . "/../../../common/src/service/UserService.php";

class SiteController 
{
	public function index()
	{
        header("Location: /?model=product&action=read");
        die();
	}

    public function login()
    {
        include_once __DIR__ . "/../../views/site/login.php";
    }
}