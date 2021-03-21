<?php
    include_once __DIR__ . "/../header.php";
?>

    <script src="/js/comments.js"></script>

<div id="breadcrums" class="width1024">
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">Discounts and Clearance</a></li>
		<li><?=$product['title']?></li>
	</ul>
</div>
	<div id="product-content" class="width1024">
		<div id="content" class="body">
			<div id="product">
				<div class="columns">
					<div class="column">
						<img style="width: 256px; height: 397px;" src="http://localhost/shop/uploads/products/<?=$product['picture']?>">
					</div>
					<div class="column">
						<h1><?=$product['title']?></h1>
							<div class="info">
                                <p><?=$product['preview']?></p>
							</div>
						<div class="price-block">
							<div>
								<div class="label"> Our Price: <span> $<?=$product['price']?></span></div>
								<div class="statistic"> Was 200$; save 20% </div>
								<form action="/?model=basket&action=addProduct" method="post">
									<input type="hidden" name="quantity" value="1">
									<input type="hidden" name="product_id" value="<?=$product['id']?>">
									<button>Add To Cart</button>
								</form>
							</div>
							<div class="secure">			
								<div> Safe Secure Shopping </div>
								<div>
                                    <img src="imgs/payments01.jpg" alt="">
                                    <img src="imgs/payments02.jpg" alt="">
                                    <img src="imgs/payments03.jpg" alt="">
                                </div>
							</div>
						</div>
					</div>
				</div>
			<div id="product-info">
				<div class="columns">
					<div class="column">
						<div class="bookmarks">
							<ul>
								<li class="active"><a href="#">Product Information</a></li>
								<li><a href="#">Other Details</a></li>
							</ul>
						</div>
						<div class="contents">
							<div class="content short">
								<?=$product['preview']?>
							</div>
							<div class="content full hide">
								<?=$product['content']?>
							</div>
						</div>
						<div id="comments">
                            <h4>Comments</h4>
							<div class="comments-list">
							</div>

							<form id="comment-form" action="#">
                                <input type="hidden" name="product_id" value="<?=$_GET['id'] ?? ''?>">
								<h4> Write a comment </h4>
								<div>
								    <label> Your name </label>
								    <input type="text" name="username" autocomplete="off">
								</div>
								<div>
								    <label> Email </label>
								    <input type="text" name="email">
								</div>
								<div>
								    <label> Message </label>
								    <textarea name="message"></textarea>
								</div>
								<div>
								    <button> Submit </button>
								</div>
							</form>

						</div>
					</div>
					<div class="products-list column">
						<h4>You May also Like</h4>
							<ul>
								<li>
									<div>
                                        <a href="#">
                                            <img src="imgs/product01.jpg" alt="">
                                        </a>
                                    </div>
										<div>
										<h3><a href="#">Hare with Amber eyes</a></h3>
										<div class="price">$45.0</div>
										<div><button>Read me</button></div>
									</div>
								</li>
								<li>
									<div>
                                        <a href="#">
                                            <img src="imgs/product01.jpg" alt="">
                                        </a>
                                    </div>
										<div>
										<h3><a href="#">Hare with Amber eyes</a></h3>
										<div class="price">$45.0</div>
										<div><button>Read me</button></div>
									</div>
								</li>
								<li>
									<div>
                                        <a href="#">
                                            <img src="imgs/product01.jpg" alt="">
                                        </a>
                                    </div>
										<div>
										<h3><a href="#">Hare with Amber eyes</a></h3>
										<div class="price">$45.0</div>
										<div><button>Read me</button></div>
									</div>
								</li>
								<li>
									<div>
                                        <a href="#">
                                            <img src="imgs/product01.jpg" alt="">
                                        </a>
                                    </div>
										<div>
										<h3><a href="#">Hare with Amber eyes</a></h3>
										<div class="price">$45.0</div>
										<div><button>Read me</button></div>
									</div>
								</li>
								<li>
									<div>
                                        <a href="#">
                                            <img src="imgs/product01.jpg" alt="">
                                        </a>
                                    </div>
										<div>
										<h3><a href="#">Hare with Amber eyes</a></h3>
										<div class="price">$45.0</div>
										<div><button>Read me</button></div>
									</div>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once __DIR__ . "/../footer.php"; ?>