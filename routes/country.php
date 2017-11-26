<?php

function GetCountryById($id)
{
	$array = Sql::FetchQuery("SELECT * FROM COU_COUNTRY WHERE COU_ID = ".$id);

	return json_encode(Country::ToCountry($array[0]));
}

function GetActiveCountries()
{	
	$array = Sql::FetchQuery("SELECT * FROM COU_COUNTRY ORDER BY COU_LABEL");

	return json_encode(Country::ToCountries($array));
}

?>