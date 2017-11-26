<?php

class Account
{
	public $Id;
	public $FirstName;
	
	function Account()
	{		
	}
	
	static function ToAccount($input)
	{
		$r = new Account();
		
		$r->Id = $input['ACC_ID'];
		$r->FirstName = utf8_encode($input['ACC_FIRSTNAME']);
		
		return $r;
	}	
	
	static function ToAccounts($input)
	{
		$result = array();
		$i = 0;
		foreach($input as $r)
		{
			$r = Account::ToAccount($input[$i]);
			
			array_push($result, $r);
			$i++;
		}		
		
		return $result;
	}
}

?>