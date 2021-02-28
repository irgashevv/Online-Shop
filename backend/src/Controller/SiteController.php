<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";

class SiteController 
{
	public function index()
	{
        header("Location: /index.php?model=product&action=read");
	}

    public function login()
    {
        include_once __DIR__ . "/../../views/site/login.php";
    }

}