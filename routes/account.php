<?php

function GetAccountById($id)
{
	$array = Sql::FetchQuery("SELECT * FROM ACC_ACCOUNT WHERE ACC_ID = ".$id);

	return json_encode(Account::ToAccount($array[0]));
}

function GetActiveAccounts()
{	
	$array = Sql::FetchQuery("SELECT * FROM ACC_ACCOUNT");

	return json_encode(City::ToAccount($array));
}

?>