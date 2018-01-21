<?php
//dbconnect.class.php

class dbManager
{
/*localhost	*/
private $dbname = 'project_registration';
private $host = 'localhost';
private $user = 'root';
private $pass = '';

private $charset = 'utf8';
private $data;
public $conn;
private $db;
public $last_id;


function __construct() {}

public function getConnect()
{
	try
	{
	$this->data = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
	$this->conn = new PDO($this->data, $this->user, $this->pass);
	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //dodatkowe opcje -> manual

	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	
	
	return $this->conn;
}

public function closeConnection()
{
	$this->conn = null;
	
}

public function selectWhere($query)
{
	$db=$this->getConnect();
	try
			{
				$result = $db->query($query);
				$this->last_id = $db->lastInsertId();
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			
			
			return $result;
}

}

?>