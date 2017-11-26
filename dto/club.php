<?php

class Club
{
	public $Id;
	public $Label;
	
	function Club()
	{		
	}
	
	static function ToClub($input)
	{	
		$r = new Club();
		
		$r->Id = $input['CLU_ID'];
		$r->Label = utf8_encode($input['CLU_LABEL']);
		$r->Rating = utf8_encode($input['CLU_RATING']);		
							
		return $r;
	}	
	
	static function ToClubs($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = Club::ToClub($input[$i]);
			
			$r->City = new City();
			$r->City->Label = utf8_encode($input[$i]['CIT_LABEL']);	
			$r->City->PostalCode = utf8_encode($input[$i]['CIT_POSTALCODE']);	
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>