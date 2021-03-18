<?php
    include_once __DIR__ . "/../header.php";
    include_once __DIR__ . "/../../../common/src/Service/PagerService.php";
?>

<div id="content" class="width1024">

<?php include_once __DIR__ . "/../sidebar.php"; ?>

	<div class="body">
		<div id="product-list">
			<ul>
<?php for ($i=0; $i < sizeof($all); $i++) : 
	if ($i % 5 === 0) print "</ul><ul>" ;
		?>
				<li>
					<img src="../../imgs/sale30.png" alt="">
                    <a href="/?model=product&action=view&id=<?=$all[$i]['id']?>">
                        <img src="http://localhost/shop/uploads/products/<?=$all[$i]['picture']?>" alt="">
                    </a>
					<h4>
                        <a href="/?model=product&action=view&id=<?=$all[$i]['id']?>">
                            <?=$all[$i]['title']?>
                        </a>
                    </h4>
					<div class="price">$<?=$all[$i]['price']?></div>
				</li>
<?php endfor; ?>
			</ul>
            <?php
                PagerService::printPager();
            ?>
		</div>
	</div>
</div>
<?php include_once __DIR__ . "/../footer.php"; ?>
	