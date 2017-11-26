<?php

class Serie
{
	public $Id;
	public $Label;
	
	function Serie()
	{		
	}
	
	static function ToSerie($input)
	{
		$r = new Serie();
		
		$r->Id = $input['SER_ID'];
		$r->Label = utf8_encode($input['SER_LABEL']);
		
		return $r;
	}	
	
	static function ToSeries($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = Serie::ToSerie($input[$i]);
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>