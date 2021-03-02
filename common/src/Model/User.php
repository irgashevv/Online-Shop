<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/../Service/UserService.php";

class User
{
    const ROLE_USER_VALUE = 'ROLE_USER';

    /**
     * @var int
     */
    private $id;
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
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $roles;

    private $conn;

    public function __construct(
        $id = 0,
        $name = "",
        $phone = "",
        $email = "",
        $password = "",
        $roles = [])
    {
        $this->conn = DBConnector::getInstance()->connect();
        $this->setId($id);
        $this->setName($name);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRoles($roles);

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
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = UserService::encodePassword($password);
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }


    public function save()
    {
        if ($this->id > 0)
        {
            $query = "UPDATE `user` set 
	    	`name`='" . $this->getName() . "',
		    `phone`='" . $this->getPhone() . "',
		    `email`='" . $this->getEmail() . "',
		    `password`='" . $this->getPassword() . "',
		    `roles`='" . json_encode($this->getRoles()) . "'
		    where id=" . $this->id . " limit 1";
        } else
        {
            $query = "INSERT INTO `user` (
                `id`, 
                `name`, 
                `phone`, 
                `email`, 
                `password`, 
                `roles`) VALUES (
                null,
		        '" . $this->getName() . "',
		        '" . $this->getPhone() . "',
		        '" . $this->getEmail() . "',
		        '" . $this->getPassword() . "',
		        '" . json_encode($this->getRoles()) . "')";
        }
        $result = mysqli_query($this->conn, $query);
        if (!$result)
        {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $result = mysqli_query($this->conn, "select * from `user` where 
            id = " . $id . " limit 1");

        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($one);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        $result = mysqli_query($this->conn, "select * from `user` where 
            email = '" . $email . "' limit 1");

        if (!$result)
        {
            throw new Exception("User not Found", 404);
        }
        $one = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($one);
    }

    /**
     * @param array $roles
     * @param $controller
     * @param $action
     * @return bool
     * @throws Exception
     */
    public function isAccess(array $roles, $controller, $action)
    {
        $permission = SecurityService::getPermissionNameByControllerAndAction($controller, $action);

        $result = mysqli_query($this->conn, "select * from `rbac_access` where 
            role in  ('" . implode("','", $roles) . "') and permission = '$permission'");

        if (!$result)
        {
            throw new Exception("Permission Error", 400);
        }

        $accesses = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($accesses as $access)
        {
            if ($access)return true;
        }
        throw new Exception("No Permission", 400);
    }
}