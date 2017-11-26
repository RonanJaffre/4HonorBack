<?php

function GetWeightById($id)
{
	$array = Sql::FetchQuery("SELECT * FROM wei_weight WHERE WEI_ID = ".$id);

	return json_encode(Weight::ToWeight($array[0]));
}

function GetActiveWeightsByDisciplineId($id)
{	
	$array = Sql::FetchQuery("SELECT * FROM wei_weight WHERE WEI_DIS_ID = ".$id . " ORDER BY WEI_MIN");

	return json_encode(Weight::ToWeights($array));
}

?>