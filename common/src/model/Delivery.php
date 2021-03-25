<?php


class Delivery
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $code;
    /**
     * @var int
     */
    private $priority;

    private $conn;

    public function __construct(
        $id         = null,
        $title      = null,
        $code       = null,
        $priority   = null
    ) {
        $this->conn     = DBConnector::getInstance()->connect();
        $this->id       = $id;
        $this->title    = $title;
        $this->code     = $code;
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;
    }

    public function save()
    {
        if ($this->id > 0) {
            $query = "UPDATE delivery set 
		    title='" . $this->title . "',
		    code='" . $this->code . "',
		    priority='" . $this->priority . "' where 
		    id=" . $this->id . " limit 1";
        } else {
            $query = "INSERT INTO delivery VALUES (
                null,
		        '" . $this->title . "',
		        '" . $this->code . "',
		        '" . $this->priority . "')";
        }
        $result = mysqli_query($this->conn, $query);
    }

    public function deleteById($id)
    {
        mysqli_query($this->conn, "delete from delivery where id = $id");
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "select * from delivery where id = $id ");
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($one);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "select * from delivery order by id desc");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}