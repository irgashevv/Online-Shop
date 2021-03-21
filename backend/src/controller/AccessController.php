<?php
    include_once __DIR__ . "/AbstractController.php";
    include_once __DIR__ . "/../../../common/src/model/Role.php";
    include_once __DIR__ . "/../../../common/src/model/Permission.php";
    include_once __DIR__ . "/../../../common/src/model/Access.php";


	class AccessController extends AbstractController
	{
		public function save()
		{
			if (!empty($_POST))
			{
			    if ((new Access())->clear()) {

                    if ((new Access())->createAll($_POST['access'] ?? [])){

                        header('Location: /?model=access&action=update');
                        die();
                    }
                }
			}
		}

		public function create()
		{

		}

		public function read()
		{

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

		}
	}