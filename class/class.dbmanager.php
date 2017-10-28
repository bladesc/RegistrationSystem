<?php
//class.dbmanager.php

class DbManager 
{
	private $query;
	private $execute;
	protected $errors;
	private $connect;
	private $result;
	protected $last_id;
	
	function __construct() {
		$this->errors = Array();
	}
	
	public function showErros()
	{
		foreach($this->errors as $key=>$value)
		{
			echo $key . " : " . $value . "<br/>";
		}
		
	}
	
	public function dbConnect()
	{
		
		$this->connect = mysqli_connect(DBSERVER,DBUSER,DBPASSWORD,DBNAME);
		if($this->connect)
		{
			echo "Connection succed";  
		} 
		else
		{
			array_push($this->errors, "Can't connect");
		}
		
		
	}
	
	public function dbSetQuery($query)
	{
		$this->query=$query;
		
		
	}
	
	public function dbExecute()
	{
        $this->result = mysqli_query($this->connect, $this->query);
		if($this->result)
		{
			
			$this->last_id=mysql_insert_id();
			return true;
		}
		else
		{
			array_push($this->errors,"command executed failed");
			return false;
		}
		
	}
	
	public function dbClose()
	{
		mysqli_close($this->connect);
	}
	
	public function getID()
	{
		return $this->last_id;
	}
	
	function __destruct()
	{}
	
	
	
}



?>