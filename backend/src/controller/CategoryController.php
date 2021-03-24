<?php
    include_once __DIR__ . "/AbstractController.php";
    include_once __DIR__ . "/../../../common/src/model/Category.php";

class CategoryController extends AbstractController
    {
        public function all()
        {
            $all = (new Category())->all();
            include_once __DIR__ . "/../../views/product/list.php";
        }

        public function save()
        {
            if (!empty($_POST))
            {
                $category = new Category(
                    (int)$_POST['id'],
                    htmlspecialchars($_POST['title']),
                    (int)$_POST['group_id'],
                    (int)$_POST['parent_id'],
                    (int)$_POST['prior']
                    );
                $category->save();
            }
            return $this->read();
        }

        public function create()
        {
            include_once __DIR__ . "/../../views/category/form.php";
        }

        public function read()
        {
            $all = (new Category())->all();
            include_once __DIR__ . "/../../views/Category/list.php";
        }
        public function update()
        {
            $id = (int)$_GET['id'];
            if (empty($id)) die('Undefined id');

            $one = (new Category())->getById($id);
            if (empty($one)) die('Product not found');

            include_once __DIR__ . "/../../views/Category/form.php";
        }
        
        public function delete()
        {
            $id = (int) $_GET['id'];
            (new Category())->deleteById($id);
            return $this->read();
        }
    }