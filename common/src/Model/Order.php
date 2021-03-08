<?php
	
	include_once __DIR__ .'/../Service/DBConnector.php';
	include_once __DIR__ .'/../Model/Product.php';

class Order
{
    /**
     * @var mixed|null
     */
	private $id;

    /**
     * @var mixed|null
     */
    private $user_id;

    /**
     * @var int
     */
    private $delivery_id;

    /**
     * @var int
     */
    private $payment_id;

    /**
     * @var int
     */
    private $total;

    /**
     * @var mixed|null
     */
    private $status;

    /**
     * @var false|string
     */
    private $created;

    /**
     * @var datetime
     */
    private $updated;

    /**
     * @var string|null
     */
    private $comment;


    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $phone;


    /**
     * @var string
     */
    private $email;


    /**
     * @var false|mysqli
     */
	private $conn;

    /**
     * Order constructor.
     * @param int|null $id
     * @param int|null $user_id
     * @param int $delivery_id
     * @param int $payment_id
     * @param int $status
     * @param int $updated
     * @param string $name
     * @param string $phone
     * @param string $email
     * @param string $comment
     */
	public function __construct(
	    $id = null,
        $user_id = null,
        $payment_id = null,
        $delivery_id = null,
        $total = null,
        $comment = null,
        $name = null,
        $phone = null,
        $email = null,
        $status = null,
        $updated = null)
	{
		$this->conn = DBConnector::getInstance()->connect();
        $this->id = $id;
        $this->user_id = $user_id;
        $this->payment_id = $payment_id;
        $this->delivery_id = $delivery_id;
        $this->total = $total;
        $this->status = $status;
        $this->comment = $comment;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;

        if ($this->id == null)
        {
            $this->created = date('Y-m-d H:i:s', time());
        }

        $this->updated = $updated ?? date('Y-m-d H:i:s', time());
	}

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param $status
     * @return mixed|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed|null
     */
    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed|null $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getDeliveryId(): int
    {
        return $this->delivery_id;
    }

    /**
     * @param int $delivery_id
     */
    public function setDeliveryId(int $delivery_id)
    {
        $this->delivery_id = $delivery_id;
    }

    /**
     * @return int
     */
    public function getPaymentId(): int
    {
        return $this->payment_id;
    }

    /**
     * @param int $payment_id
     */
    public function setPaymentId(int $payment_id)
    {
        $this->payment_id = $payment_id;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total)
    {
        $this->total = $total;
    }

    /**
     * @return string|null
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }


    /**
     * @return false|string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param false|string $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return false|mixed|string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param false|mixed|string $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return false|mysqli
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param $conn
     * @return $this
     */
    public function setConn($conn)
    {
        $this->conn = $conn;

        return $this;
    }


    /**
     * @throws Exception
     */
	public function save()
	{
		$query = "INSERT INTO `orders` (
                    `id`, 
                    `user_id`, 
                    `total`, 
                    `payment_id`, 
                    `delivery_id`, 
                    `comment`, 
                    `name`, 
                    `phone`, 
                    `email`, 
                    `status`,
                    `created`,
                    `updated`) 
        VALUES (
                null,
                '" . $this->user_id . "' ,
                '" . $this->total . "',
                '" . $this->payment_id . "',
                '" . $this->delivery_id . "',
                '" . $this->comment . "',
                '" . $this->name . "',
                '" . $this->phone . "',
                '" . $this->email . "',
                '" . $this->status . "',
                '" . $this->created . "',
                '" . $this->updated . "'
                )";

		$result = mysqli_query($this->conn, $query);

		if (!$result)
		{
			throw new Exception(mysqli_error($this->conn));
		}

		    $result =  mysqli_query($this->conn, "SELECT LAST_INSERT_ID() as last_id");

		    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

		    return reset ($result)['last_id'] ??null;
	}

    /**
     * @throws Exception
     */
	public function update()
	{
		$query = "UPDATE orders SET  
                `status` = '" . $this->status . "',
                `updated` = '" . $this->updated . "',
                `delivery_id` = '" . $this->delivery_id . "',
                `payment_id` = '" . $this->payment_id . "',
                `total` = '" . $this->total . "',
                `name` = '" . $this->name . "',
                `email` = '" . $this->email . "',
                `phone` = '" . $this->phone . "'
                where id = " . $this->id . " limit 1";

		$result = mysqli_query($this->conn, $query);

		if (!$result)
		{
			throw new Exception(mysqli_error($this->conn));
		}
		    return true;
	}

	public function getFromDB()
	{
		$result = mysqli_query($this->conn, "select * from orders where 
            user_id = " . $this->user_id . " limit 1");
		$one = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return reset($one);
	}

	public function all()
	{
		$result = mysqli_query($this->conn, "select * from orders");
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

    /**
     * @return mixed
     */
    public function getById($id)
    {
        $result = mysqli_query($this->conn, "select * from orders where 
            id = " . $id . " limit 1");

        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($one);
    }

    public function getProductsAndOrderByOrderId($orderId)
    {
        $products = [];

        $result = mysqli_query($this->conn, "SELECT
                order_item.quantity,
                products.*
                FROM
                order_item
                LEFT JOIN products ON order_item.product_id = products.id
                WHERE order_id = " . $orderId);

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $products[] = [
                'quantity' => $item['quantity'],
                'product' => new Product($item['id'], $item['title'], $item['picture'],
                    $item['preview'], $item['content'], $item['price'], $item['status'],
                    $item['created'], $item['updated'])
            ];
        }
        return $products;
    }
}