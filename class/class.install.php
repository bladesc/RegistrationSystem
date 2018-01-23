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
	$this->db->getConnect();
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
	surname VARCHAR(40),
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
	idclient INT,
    PRIMARY KEY (id)
	)";

	
	
	$this->db->selectWhere($guery1);
	
	$this->db->selectWhere($guery2);
	
	$this->db->selectWhere($guery3);
	
	$this->db->selectWhere($guery4);
	
	$this->db->selectWhere($guery5);
	
	return true;
}

public function makeData()
{
	$guery01 = "INSERT INTO `project_registration`.`cities` (`id`, `cityname`) VALUES (NULL, 'Białogard'), (NULL, 'Koszalin'), (NULL, 'Kołobrzeg')";
	$guery02 = "INSERT INTO `project_registration`.`clinics` (`id`, `idcities`, `name`, `adress`) VALUES (NULL, '1', 'Klinika nr1', 'Jana Kochanowskiego 2a, '), (NULL, '2', 'Klinika nr1', 'Pomorska 12'), (NULL, '1', 'Klinika nr2', 'Aldony 15b'), (NULL, '2', 'Klinika nr2', 'Kołobrzeska 453'), (NULL, '2', 'Klinika nr3', 'Ignacego 34'), (NULL, '3', 'Klinika nr1', 'Staromiejska 15')";
	$guery03 = "INSERT INTO `project_registration`.`doctors` (`id`, `idclinics`, `name`, `mobile`) VALUES (NULL, '1', 'Jan Kowalski', '566544344'), (NULL, '1', 'Łukasz Nowak', '348774884'), (NULL, '2', 'Krzysztof Borkowski', '4343434555'), (NULL, '2', 'Jan Mikuła', '348774884'), (NULL, '3', 'Ignacy Bąk', '348774884');";
	$this->db->selectWhere($guery01);
	$this->db->selectWhere($guery02);
	$this->db->selectWhere($guery03);
	return true;
}

function __destruct()
{
	$this->db->closeConnection();
}

}

?>