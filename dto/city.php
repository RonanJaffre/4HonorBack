<?php

class City
{
	public $Id;
	public $Label;
	
	function City()
	{		
	}
	
	static function ToCity($input)
	{
		$r = new City();
		
		$r->Id = $input['CIT_ID'];
		$r->Label = utf8_encode($input['CIT_LABEL']);
		
		return $r;
	}	
	
	static function ToCities($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = City::ToCity($input[$i]);
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>