<?php
//class.install.php

class Install
{
	private $errors;
	private $db;
	


function __construct()
{
	$this->errors=Array();
	$this->db = new DbManager;
	$this->db->dbConnect();
}

public function createTables()
{
	$guery1 = "CREATE TABLE cities (
    id INT NOT NULL AUTO_INCREMENT,
    cityname VARCHAR(40),
    PRIMARY KEY (id)
	)";

	$guery2 = "CREATE TABLE clinics (
    id INT NOT NULL AUTO_INCREMENT,
    idcities INT,
	name VARCHAR(70),
	adress VARCHAR(70),
    PRIMARY KEY (id)
	)";
	
	$guery3 = "CREATE TABLE doctors (
    id INT NOT NULL AUTO_INCREMENT,
    idclinics INT,
	name VARCHAR(60),
	mobile VARCHAR(10),
    PRIMARY KEY (id)
	)";

	$guery4 = "CREATE TABLE clients (
    id INT NOT NULL AUTO_INCREMENT,
	iddoctors INT,
    firstname VARCHAR(40),
	street VARCHAR(40),
	city VARCHAR(40),
	code VARCHAR(6),
	email VARCHAR(40),
	mobile VARCHAR(10),
	acceptance TINYINT(1),
    PRIMARY KEY (id)
	)";
	
	$guery5 = "CREATE TABLE dates (
    id INT NOT NULL AUTO_INCREMENT,
    chdate DATETIME,
	iddoctors INT,
    PRIMARY KEY (id)
	)";

	
	
	$this->db->dbSetQuery($guery1);
	if(!$this->db->dbExecute())
	{   $this->db->showErrors();
echo "blad";
		die();
	}
	$this->db->dbSetQuery($guery2);
	if(!$this->db->dbExecute())
	{   $this->db->showErrors();
		die();
	}
	$this->db->dbSetQuery($guery3);
	if(!$this->db->dbExecute())
	{   $this->db->showErrors();
		die();
	}
	$this->db->dbSetQuery($guery4);
	if(!$this->db->dbExecute())
	{   $this->db->showErrors();
		die();
	}
	$this->db->dbSetQuery($guery5);
	if(!$this->db->dbExecute())
	{   $this->db->showErrors();
		die();
	}
	
}

function __destruct()
{
	$this->db->dbClose();
}

}

?>