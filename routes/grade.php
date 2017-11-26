<?php

function GetGradeById($id)
{
	$array = Sql::FetchQuery("SELECT * FROM GRA_GRADE WHERE GRA_ID = " . $id);

	return json_encode(Grade::ToGrade($array[0]));
}

function GetActiveGradesByDisciplineId($id)
{	
	$array = Sql::FetchQuery("SELECT * FROM GRA_GRADE WHERE WEI_DIS_ID = " . $id . " ORDER BY SER_LABEL");

	return json_encode(Grade::ToGrades($array));
}

?>