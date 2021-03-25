<?php
include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/model/Permission.php";


class PermissionController extends AbstractController
{
    /**
     * @throws Exception
     */
    public function save()
    {
        if (!empty($_POST)) {
            $news = new Permission(htmlspecialchars($_POST['permission']));
            $news->save();
        }
        return $this->read();
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/permission/form.php";
    }

    public function read()
    {
        $all = (new Permission())->all();
        include_once __DIR__ . "/../../views/permission/list.php";
    }

    public function update()
    {
    }

    /**
     * @throws Exception
     */
    public function delete()
    {
        $id = htmlspecialchars($_GET ['permission']);
        (new Permission())->deleteByName($id);
        return $this->read();
    }
}