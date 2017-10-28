<?php
//class.functions.php

class Functions{
	
	__construct()
	{}
	
	static function generateList($name,$array_option)
	{
		if(!empty($array_option))
		{
			$html .= "<select id='$name'>";
			foreach($array_option as $key)
			{
				$html .= "<option value='$key'>$key</option>";
			}
			$html .= "</select>";
			return $html;
		}
		
		else
		{
			return 0;
		}
	}

	static function filter($value)
    {
    $value=trim(htmlspecialchars(addslashes($value)));
	return $value;
    }
	
	__destruct()
	{}


}



?>