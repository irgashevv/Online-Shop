<?php 
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class MigrationAddCategoryGroup {

	private $conn; 

	public function __construct(DBConnector $connector)
	{
		$this->conn = $connector->connect();
	}

	public function commit()
	{
		$result = mysqli_query($this->conn, "create table category_group (
        id int not null auto_increment,
        title varchar(64) not null,
        primary key (id)
        ) engine = innoDB default charset 'utf8';");
		
		if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}

        $result = mysqli_query($this->conn, "insert into `category_group` (`title`) values ('Жанр'),
            ('Топ 100'), ('Авторы'), ('Часто покупаемые'), ('Год издания')");

        if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}

        $result = mysqli_query($this->conn, "insert into `categories` (`title`, `group_id`, `parent_id`, `prior`) 
        values 
        ('Комедия', '1', '0', '100'),
        ('Детектив', '1', '0', '90'),
        ('Фантастика', '1', '0', '80'),
        ('Драма', '1', '0', '70'),
        ('Научные', '1', '0', '60'),
        ('Исторические', '1', '0', '50'),
        ('Бизнес', '1', '0', '1000'),
        ('За 2020 год', '2', '0', '10'),
        ('За текущий год', '2', '0', '90'),
        ('За 20 столетие', '2', '0', '80'),
        ('За текущий год', '2', '0', '90'),
        ('Билл Мартин', '3', '0', '100'),
        ('Джемс Херрист', '3', '0', '90'),
        ('Тини Ченчез', '3', '0', '80'),
        ('Комедии', '4', '0', '100'),
        ('Детективы', '4', '0', '80'),
        ('Детские', '4', '0', '90'),
        ('1800-1900', '5', '0', '100'),
        ('1900', '5', '0', '100'),
        ('21 век', '5', '0', '200'),
        ('Детские', '1', '0', '100'),
        ('Духовные', '1', '0', '80')
        ");

        if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}

        $result = mysqli_query($this->conn, "CREATE TABLE category_product (
                product_id int not null,
                category_id int not null
            )");

        if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}
	}
	public function rollback()
	{
		$result = mysqli_query($this->conn, "drop table category_group ;");
		if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}

		$result = mysqli_query($this->conn, "truncate table categories ;");
		if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}

		$result = mysqli_query($this->conn, "drop table category_product ;");
		if (!$result)
		{
			print mysqli_error($this->conn) . PHP_EOL;
		}
	}
}