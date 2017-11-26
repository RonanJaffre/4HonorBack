<?php

class Discipline
{
	public $Id;
	public $Label;
	
	function Discipline()
	{		
	}
	
	static function ToDiscipline($input)
	{
		$r = new Discipline();
		
		$r->Id = $input['DIS_ID'];
		$r->Label = utf8_encode($input['DIS_LABEL']);
		
		return $r;
	}	
	
	static function ToDisciplines($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = Discipline::ToDiscipline($input[$i]);
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>