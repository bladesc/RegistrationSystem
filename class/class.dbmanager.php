<?php
//dbconnect.class.php

class dbManager
{
/*localhost	*/
private $dbname = 'project_registration';
private $host = 'localhost';
private $user = 'root';
private $pass = '';
/*
//hekko
private $dbname = '';
private $host = 'localhost';
private $user = '';
private $pass = '';
*/
private $charset = 'utf8';
private $data;
public $conn;
private $db;


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
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			
			if($value)
			{
				echo "tabela zainstalowana<br/>";
			}
			return $result;
}

}

?>