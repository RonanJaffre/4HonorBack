<?php

class Fighter
{
	public $Id;
	public $Name;
	public $Club;
	
	function Fighter()
	{		
	}
	
	static function ToFighter($input)
	{
		$r = new Fighter();
		
		$r->Id = $input['FIG_ID'];
		$r->Name = utf8_encode($input['FIG_NAME']);
		
		return $r;
	}	
	
	static function ToFighters($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = Fighter::ToFighter($input[$i]);
			
			$r->Club = new Club();
			$r->Club->Id = utf8_encode($input[$i]['CLU_ID']);		
			$r->Club->Label = utf8_encode($input[$i]['CLU_LABEL']);		
			
			$r->Club->City = new City();
			$r->Club->City->Label = utf8_encode($input[$i]['CIT_LABEL']);	
			$r->Club->City->PostalCode = utf8_encode($input[$i]['CIT_POSTALCODE']);	
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>