<?php

function GetDisciplineById($id)
{
	$array = Sql::FetchQuery("SELECT * FROM dis_discipline WHERE DIS_ID = ".$id);

	return json_encode(Discipline::ToDiscipline($array[0]));
}

function GetActiveDisciplines()
{	
	$array = Sql::FetchQuery("SELECT * FROM dis_discipline ORDER BY DIS_LABEL");

	return json_encode(Discipline::ToDisciplines($array));
}

?>