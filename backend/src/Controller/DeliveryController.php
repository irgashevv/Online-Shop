<?php

include_once __DIR__ . "/AbstractController.php";


class DeliveryController extends AbstractController
{
    public function create()
    {
        include_once __DIR__ . "/../../views/delivery/form.php";
    }

    public function read()
    {
        $all = (new Delivery())->all();
        include_once __DIR__ . "/../../views/delivery/list.php";
    }

    public function update()
    {
        $id = (int)$_GET['id'];
        if (empty($id)) die('Undefined id');

        $one = (new Delivery())->getById($id);

        if (empty($one)) die('Product not found');
        include_once __DIR__ . "/../../views/delivery/form.php";

    }
    public function delete()
    {
        $id = (int) $_GET ['id'];
        (new Delivery())->deleteById($id);
        return $this->read();
    }

    public function save()
    {
        if (!empty($_POST))
        {
            $delivery = new Delivery(
                (int)$_POST['id'],
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['code']),
                htmlspecialchars($_POST['priority'])
            );
            $delivery->save();
        }
        return $this->read();
    }
}