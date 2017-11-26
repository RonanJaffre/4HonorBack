<?php

function GetCityById($id)
{
	$array = Sql::FetchQuery("SELECT * FROM CIT_CITY WHERE CIT_ID = ".$id);

	return json_encode(City::ToCity($array[0]));
}

function GetActiveCities()
{	
	$array = Sql::FetchQuery("SELECT * FROM CIT_CITY ORDER BY CIT_LABEL");

	return json_encode(City::ToCities($array));
}

?>