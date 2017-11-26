<?php

class Country
{
	public $Id;
	public $Label;
	
	function Country()
	{		
	}
	
	static function ToCountry($input)
	{
		$r = new Country();
		
		$r->Id = $input['COU_ID'];
		$r->Label = utf8_encode($input['COU_LABEL']);
		
		return $r;
	}	
	
	static function ToCountries($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = Country::ToCountry($input[$i]);
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>