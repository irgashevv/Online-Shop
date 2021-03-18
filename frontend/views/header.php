<?php
include_once __DIR__ . "/../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../common/src/Service/CategoryService.php";
include_once __DIR__ . "/../../common/src/Service/BasketDBService.php";
include_once __DIR__ . "/../../common/src/Service/ProductService.php";

$currentUser = UserService::getCurrentUser();
$basketDetails = (new ProductService())->getBasketItems(BasketDBService::defineBasketDetails());
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Book-shop</title>
        <link rel="stylesheet" href="http://localhost/shop/frontend/css/styles.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="http://localhost/shop/frontend/js/scripts.js"></script>
        <link rel="stylesheet" href="http://localhost/shop/frontend/css/shop-style.css">
    </head>
<body>
	<header>
		<div id="head">
			<div class="top">
				<div class="width1024">
					<ul class="desktop-element">
						<li>
                            <?=!empty($currentUser['login'])
                            ? '<span style="color: #fff"> Hello, ' . $currentUser['login'] . '!</span>'
                            : '<a href="/?model=register&action=form">Register</a>'?>
                        </li>
                        <li>
                            <?=!empty($currentUser['login'])
                        ? '<a href="/?model=auth&action=logout">Sign Out</a>'
                        : '<a href="/?model=site&action=login">Sign in</a>'?>
                        </li>
                        <?=!empty($currentUser['login']) ? '<li><a href="/?model=basket&action=view">Basket</a></li>' : ''?>

                        <li>
                            <a href="">
                                Help
                            </a>
                        </li>
					</ul>
					<div id="mobile-logo" class="mobile-element">BOOKS</div>
				<select id="top-link" onchange="document.location=this.value" class="mobile-element">
					<option disable selected></option>
					<option value="/?model=register&action=form">
                        Register
                    </option>
                    <option value="/?model=site&action=login">
                        Sign in
                    </option>
                    <option value="#order">
                        Order Status
                    </option>
					<option value="#help">
                        Help
                    </option>
				</select>
				</div>
			</div>
			<div class="header-panel">
				<div class="width1024 flex">
					<div id="logo">
						<a href="/">
                            <img src="http://localhost/shop/frontend/imgs/logo.png" alt="">
                        </a>
					</div>
					<div id="search-field">
						<form action="#" >
							<input type="text" name="search_text">
							<button>Search</button>
						</form>
					</div>
					<div id="basket-container">
						<div>Your cart <span>(<?=sizeof($basketDetails['items'] ?? [])?> items)</span></div>
						<div><b>$<?=$basketDetails['total'] ?? 0?></b><a href="#">Checkout</a></div>
					</div>
					<div id="favor">
						<div> Wish List </div>
					</div>
				</div>
			</div>		
		</div>
		<nav>
			<ul class="width1024 desktop-element">
                <?php foreach (CategoryService::getGenre() as $genre) :?>
                    <li>
                        <a href="/?model=product&action=all&category_id=<?=$genre['id']?>">
                            <?=$genre['title']?>
                        </a>
                    </li>
                <?php endforeach; ?>
			</ul>
			<select onchange="document.location=this.value" class="mobile-element">
				<option disabled selected>
				<option value="#Computers">
                    Computers
				<option value="#Cooking">
                    Cooking
				<option value="#">
                    Educations
				<option value="#">
                    Functions
				<option value="#">
                    Health
				<option value="#">
                    Mathematics
				<option value="#">
                    Medical
				<option value="#">
                    Reference
				<option value="#">
                    Science
			</select>
		</nav>
	</header>
<div class="body">