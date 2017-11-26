<?php

class Weight
{
	public $Id;
	public $Label;
	
	function Weight()
	{		
	}
	
	static function ToWeight($input)
	{
		$r = new Weight();
		
		$r->Id = $input['WEI_ID'];
		$r->Label = utf8_encode($input['WEI_LABEL']);
		$r->MinWeight = utf8_encode($input['WEI_MIN']);
		$r->MaxWeight = utf8_encode($input['WEI_MAX']);
		
		return $r;
	}	
	
	static function ToWeights($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = Weight::ToWeight($input[$i]);
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>