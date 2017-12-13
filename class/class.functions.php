<?php
//class.functions.php

class Functions{
	
	function __construct()
	{}
	
	public static function correctValue($value)
	{	
		$value=trim($value);
		$value=htmlspecialchars($value);
		$value=addslashes($value);
		return $value;
	}
	
	function __destruct()
	{}


}



?>