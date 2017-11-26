<?php

function GetFighterById($id)
{
	$array = Sql::FetchQuery("SELECT * FROM FIG_FIGHTER WHERE FIG_DATECLO IS NULL AND FIG_ID = ".$id);

	return json_encode(Fighter::ToFighter($array[0]));
}

function GetActiveFighters()
{	
	$query = "
	SELECT DISTINCT
	 f.FIG_ID,
	 f.FIG_NAME,
	 clu.CLU_ID,
	 clu.CLU_LABEL,
	 cit.CIT_LABEL,
	 cit.CIT_POSTALCODE
	FROM fig_fighter f
	 INNER JOIN clu_club clu ON f.FIG_CLU_ID = clu.CLU_ID
	 INNER JOIN cit_city cit ON cit.CIT_ID = clu.CLU_CIT_ID
	 INNER JOIN rfd_rel_fighter_weight rfd ON rfd.rfd_FIG_ID = f.FIG_ID
	 INNER JOIN wei_weight w ON w.WEI_ID = rfd.rfd_WEI_ID
	 INNER JOIN ser_serie s ON s.SER_ID = rfd.rfd_SER_ID
	WHERE
	 FIG_ISAVAILABLE = 1
	 AND FIG_ISVALID = 1
	 AND FIG_DATECLO IS NULL";
	
	if (isset($_GET["gender"]) && $_GET["gender"] != 2)
	{
		$query .= " AND FIG_GENDER = " . $_GET["gender"];
	}
	
	if (isset($_GET["wid"]) && $_GET["wid"] != "")
	{
		$query .= " AND WEI_ID = " . $_GET["wid"];
	}
	
	if (isset($_GET["postalcode"]) && $_GET["postalcode"] != "")
	{
		$query .= " AND cit.CIT_POSTALCODE LIKE '" . $_GET["postalcode"] ."%'";
	}	
	
	if (isset($_GET["sid"]) && $_GET["sid"] != "")
	{
		$query .= " AND s.SER_ID = " . $_GET["sid"];
	}
	
	$array = Sql::FetchQuery($query);
	
	return json_encode(Fighter::ToFighters($array));
}

?>