<?php
	include_once __DIR__ . "/Interface/ControllerInterface.php";
	include_once __DIR__ . "/../../../common/src/Model/News.php";
	include_once __DIR__ . "/../../../common/src/Service/FileUploader.php";

	class NewsController implements ControllerInterface
	{
		public function save()
		{
			if (!empty($_POST))
			{
				$filename = FileUploader::upload('news');
				$now = date ('Y-m-d H:i:s', time());

				$news = new News(
					(int)$_POST['id'],
					htmlspecialchars($_POST['title']),
					htmlspecialchars($filename ?? ''),
					htmlspecialchars($_POST['preview']), 
					htmlspecialchars($_POST['content']),
					$now,
					$now
					);
				$news->save();
			}
			return $this->read();
		}

		public function create()
		{
			include_once __DIR__ . "/../../views/news/form.php";
		}

		public function read()
		{
			$all = (new News())->all();
			include_once __DIR__ . "/../../views/news/list.php";
		}

		public function update()
		{
			$id = (int)$_GET['id'];
			if (empty($id)) die('Undifined id');

			$one = (new News())->getById($id);
			if (empty($one)) die('Product not found');

			include_once __DIR__ . "/../../views/news/form.php";
		}
		
		public function delete()
		{
			$id = (int) $_GET ['id'];
			(new News())->deleteById($id);
			return $this->read();
		}
	}