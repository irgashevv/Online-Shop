<?php

class Category
{
	public $id;
	public $title;
	public $group_id;
	public $parent_id;
	public $prior;

	private $conn;

	public function __construct(
		$id = null, 
		$title = null, 
		$group_id = null,
		$parent_id = null,
		$prior = null) {

		$this->conn = mysqli_connect("localhost", "shop_user", "shop_password", "db_shop");

		$this->id = $id;
		$this->title = $title;
		$this->group_id = $group_id;
		$this->parent_id = $parent_id;
		$this->prior = $prior;
	}
	public function save()
    {
		if ($this->id > 0)
		{
			$query = "UPDATE categories set 
			`title` ='" . $this->title . "',
			`group_id`= '" . $this->group_id . "',
			`parentId` ='" . $this->parent_id . "',
			`prior` = '". $this->prior . "'
			where id=" . $this->id . " limit 1";
        } else
            {
		        $query = "INSERT INTO categories VALUES (
                null,
		        '" . $this->title . "',
		        '" . $this->group_id . "',
		        '" . $this->parent_id . "',
		        '" . $this->prior . "')";
            }

	$result = mysqli_query($this->conn, $query);
	}
	public function all()
        {
	    	$result = mysqli_query($this->conn, "select * from categories order by id desc");
	    	return mysqli_fetch_all($result, MYSQLI_ASSOC);
	    }

	public function getByGroupIds($groups = [])
        {
            $where = '';
            if (!empty($groups)) {
                $where = ' Where group_id in (' . implode(',', $groups) . ')';
            }

	    	$result = mysqli_query($this->conn, "select * from categories $where order by id desc");

            return mysqli_fetch_all($result, MYSQLI_ASSOC);
	    }


	public function getGroupsWithCategories($groups = [])
        {
            $where = '';

            if (!empty($groups)) {
                $where = ' Where group_id NOT in (' . implode(',', $groups) . ')';
            }

	    	$result = mysqli_query($this->conn,
                "select 
                    categories.*,
                    cg.id as group_id,
                    cg.title as group_title
                    from 
                    categories 
                    left join category_group cg on group_id = cg.id
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