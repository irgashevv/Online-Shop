<?php
include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/model/Role.php";
include_once __DIR__ . "/../../../common/src/model/Permission.php";
include_once __DIR__ . "/../../../common/src/model/Access.php";


class AccessController extends AbstractController
{
    public function saveAccess()
    {
        if (!empty($_POST)) {
            $news = new Access(htmlspecialchars($_POST['role']));
            $news->saveAccess();
        }
        return $this->read();
    }

    public function save()
    {
        if (!empty($_POST)) {
            if ((new Access())->clear()) {
                if ((new Access())->createAll($_POST['access'] ?? [])) {
                    header('Location: /?model=access&action=update');
                    die();
                }
            }
        }
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/access/add-form.php";
    }

    public function read()
    {
        $all = (new Access())->getAllRoles();
        include_once __DIR__ . "/../../views/access/list.php";
    }

    public function update()
    {
        $accesses = [];
        foreach ((new Access())->all() as $item) {
            $accesses[$item['role']][$item['permission']] = true;
        }

        $roles = (new Role())->all();
        $permissions = (new Permission())->all();

        include_once __DIR__ . "/../../views/access/form.php";
    }

    public function delete()
    {
        $id = htmlspecialchars($_GET ['access']);
        (new Access())->deleteByName($id);
        return $this->read();
    }
}