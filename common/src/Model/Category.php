<?php

class Category
{
	public $id;
	public $title;
	public $groupId;
	public $parentId;
	public $prior;

	private $conn;

	public function __construct(
		$id = null, 
		$title = null, 
		$groupId = null, 
		$parentId = null,
		$prior = null) {

		$this->conn = mysqli_connect("localhost", "shop_user", "shop_password", "db_shop");

		$this->id = $id;
		$this->title = $title;
		$this->groupId = $groupId;
		$this->parentId = $parentId;
		$this->prior = $prior;
	}
	public function save()
    {
		if ($this->id > 0)
		{
			$query = "UPDATE categories set 
			`title` ='" . $this->title . "',
			`groupId`= '" . $this->groupId . "',
			`parentId` ='" . $this->parentId . "',
			`prior` = '". $this->prior . "'
			where id=" . $this->id . " limit 1";
        } else
            {
		        $query = "INSERT INTO categories VALUES (
                null,
		        '" . $this->title . "',
		        '" . $this->groupId . "',
		        '" . $this->parentId . "',
		        '" . $this->prior . "')";
            }

	$result = mysqli_query($this->conn, $query);
	}
	public function all()
        {
	    	$result = mysqli_query($this->conn, "select * from categories order by id desc");
	    	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	    }

	public function getWithoutGroupIds($groups = [])
        {
            $where = '';
            if (!empty($groups)) {
                $where = ' Where groupId not in (' . implode(',', $groups) . ')';
            }

	    	$result = mysqli_query($this->conn, "select * from categories $where order by id desc");
	    	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	    }


	public function getGroupsWithCategories($groups = [])
        {
            $where = '';

            if (!empty($groups)) {
                $where = ' Where groupId NOT in (' . implode(',', $groups) . ')';
            }

	    	$result = mysqli_query($this->conn,
                "select 
                    *,
                    cg.id as groupId,
                    cg.title as group_title,
                    cg.title as group_title,
                    from 
                    categories 
                    left join category_group cg on groupId = cg.id
                    $where order by `prior` desc"
            );

            $groups = [];

            $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (!(is_array($categories) && !empty($categories))) {
                return [];
            }
            foreach ($categories as $item) {
                $groups[$item['group_title']][] = $item;
            }
        return $groups;
	    }

	public function getById($id)
    {
		$result = mysqli_query($this->conn, "select * from categories where id = $id ");
		$one = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		return reset($one);
	}

	public function deleteById($id)
    {
		mysqli_query ($this->conn, "delete from categories where id = $id");
	} 
}