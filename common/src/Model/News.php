<?php
	
	include_once __DIR__ .'/../Service/DBConnector.php';

class News
{
	public $id;
	public $title;
	public $picture;
	public $preview;
	public $content;
	public $created;
	public $updated;

	private $conn;

	public function __construct(
		$id = null, 
		$title = null, 
		$picture = null, 
		$preview = null, 
		$content = null, 
		$created = null,
		$updated = null) {
	
		$this->conn = DBConnector::getInstance()->connect();
		
		$this->id = $id;
		$this->title = $title;
		$this->picture = $picture;
		$this->preview = $preview;
		$this->content = $content;
		$this->created = $created;
		$this->updated = $updated;
	}


	public function save()
    {
	    if ($this->id > 0)
	    {
	    	$query = "UPDATE news set 
		    title='" . $this->title . "',
		    preview='" . $this->preview . "',
		    ". ((!empty($this->picture)) ? "picture='" . $this->picture . "'," : "")
		    . "content='". $this->content . "',
		    updated='" . $this->updated . "' where 
		    id=" . $this->id . " limit 1";
        } else
            {
                $query = "INSERT INTO news VALUES (
                null,
		        '" . $this->title . "',
		        '" . $this->picture . "',
		        '" . $this->preview . "',
		        '" . $this->content . "',
		        '" . $this->created . "',
	        	'" . $this->updated . "')";
            }
	$result = mysqli_query($this->conn, $query);
	}

	public function all()
    {
		$result = mysqli_query($this->conn, "select * from news order by id desc");
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	public function getById($id)
    {
		$result = mysqli_query($this->conn, "select * from news where id = $id ");
		$one = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return reset($one);
	}

	public function deleteById($id)
    {
		mysqli_query ($this->conn, "delete from news where id = $id");
	} 
}