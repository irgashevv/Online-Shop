<?php
	include_once __DIR__ . "/Interface/ControllerInterface.php";
	include_once __DIR__ . "/../../../common/src/Model/Product.php";
	include_once __DIR__ . "/../../../common/src/Service/FileUploader.php";

	class ProductController implements ControllerInterface
	{
		public function save()
		{
			if (!empty($_POST))
			{
				$filename = FileUploader::upload('products');
				$now = date ('Y-m-d H:i:s', time());

				$product = new Product(
					(int)$_POST['id'],
					htmlspecialchars($_POST['title']),
					htmlspecialchars($filename ?? ''),
					htmlspecialchars($_POST['preview']), 
					htmlspecialchars($_POST['content']),
					(int)$_POST['price'],
					(int)$_POST['status'], 
					$now,
					$now);
				$product->save();
			}
			return $this->read();
		}

		public function create()
		{
			include_once __DIR__ . "/../../views/product/form.php";
		}

		public function read()
		{
			$all = (new Product())->all();
			include_once __DIR__ . "/../../views/product/list.php";
		}

		public function update()
		{
			$id = (int)$_GET['id'];
			if (empty($id)) die('Undifined id');

			$one = (new Product())->getById($id);

			if (empty($one)) die('Product not found');
			include_once __DIR__ . "/../../views/product/form.php";

		}
		public function delete()
		{
			$id = (int) $_GET ['id'];
			(new Product())->deleteById($id);
			return $this->read();
		}
	}