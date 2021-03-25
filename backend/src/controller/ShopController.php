<?php
include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/model/Shop.php";

class ShopController extends AbstractController
{
    public function save()
    {
        if (!empty($_POST)) {
            $shop = new shop(
                (int)$_POST['id'],
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['address']));
            $shop->save();
        }
        return $this->read();
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/shop/form.php";
    }

    public function read()
    {
        $all = (new Shop())->all();
        include_once __DIR__ . "/../../views/shop/list.php";
    }

    public function update()
    {
        $id = (int)$_GET['id'];
        if (empty($id)) die('Undefined id');

        $one = (new Shop())->getById($id);

        if (empty($one)) die('Shop not found');
        include_once __DIR__ . "/../../views/shop/form.php";
    }

    public function delete()
    {
        $id = (int)$_GET ['id'];
        (new Shop())->deleteById($id);
        return $this->read();
    }
}