<?php

class Grade
{
	public $Id;
	public $Label;
	
	function Grade()
	{		
	}
	
	static function ToGrade($input)
	{
		$r = new Grade();
		
		$r->Id = $input['GRA_ID'];
		$r->Label = utf8_encode($input['GRA_LABEL']);
		
		return $r;
	}	
	
	static function ToGrades($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = Grade::ToGrade($input[$i]);
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>