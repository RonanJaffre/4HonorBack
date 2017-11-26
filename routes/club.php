<?php

function GetClubById($id)
{

	$array = Sql::FetchQuery("
		SELECT *,3 as CIT_RATING
		FROM CLU_CLUB
		WHERE CLU_DATECLO IS NULL AND CLU_ID = " . $id);

	return json_encode(Club::ToClub($array[0]));
}

function GetActiveClubs()
{	
	$query = "
		SELECT DISTINCT
		 CLU_ID,
		 CLU_LABEL,
		 CIT_LABEL,
		 CIT_POSTALCODE,
		 3 as CLU_RATING
		FROM clu_club clu
		INNER JOIN cit_city cit ON clu.CLU_CIT_ID = cit.CIT_ID";
	
	$where = " WHERE CLU_DATECLO IS NULL ";	
		
		if (isset($_GET["postalcode"]) && $_GET["postalcode"] != "")
		{
			$where .= " AND cit.CIT_POSTALCODE LIKE '" . $_GET["postalcode"] ."%'";
		}	
		
		if (isset($_GET["did"]) && $_GET["did"] != "")
		{
			$query .= "
			INNER JOIN fig_fighter f ON f.FIG_CLU_ID = clu.CLU_ID
			INNER JOIN rfd_rel_fighter_weight rfd ON rfd.rfd_fig_id = f.FIG_ID
			INNER JOIN wei_weight w ON rfd.rfd_wei_id = w.wei_id
			INNER JOIN dis_discipline d ON d.dis_id = w.wei_dis_id";
			$where .= " AND d.DIS_ID = " . $_GET["did"];
		}
		
		$query .= $where;
		$query .= " ORDER BY CLU_LABEL";
		

		$array = Sql::FetchQuery($query);	
		
		return json_encode(Club::ToClubs($array));
	}

function GetActiveClubsByDisciplineId($id)
{	
	$array = Sql::FetchQuery("SELECT * FROM CLU_CLUB WHERE CLU_DATECLO IS NULL AND CLU_DIS_ID = " . $id . " ORDER BY CLU_LABEL");

	return json_encode(Club::ToClubs($array));
}

?>