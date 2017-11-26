<?php

function GetSerieById($id)
{
	$array = Sql::FetchQuery("SELECT * FROM ser_serie WHERE SER_ID = ".$id);

	return json_encode(Serie::ToSerie($array[0]));
}

function GetActiveSeriesByDisciplineId($disciplineId)
{	
	$array = Sql::FetchQuery("SELECT * FROM ser_serie WHERE SER_DIS_ID = " . $disciplineId . " ORDER BY SER_LABEL");

	return json_encode(Serie::ToSeries($array));
}

?>