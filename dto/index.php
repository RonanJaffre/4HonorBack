<?php

    include_once("./includes.php");
    
    function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
	
        if (strstr($uri, '?'))
		$uri = substr($uri, 0, strpos($uri, '?'));
		
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    $base_url = getCurrentUri();
    $routes = array();
    $routesUrl = explode('/', $base_url);
    foreach($routesUrl as $route)
    {
        if (trim($route) != '')
            array_push($routes, strtoupper($route));
    }
        if (count($routes) > 1)
	{
		if ($routes[0] == 'GET')
		{
			switch ($routes[1])
			{	
				case "FIGHTER": 
					echo(GetFighterById($routes[2]));        
					break;
				case "FIGHTERS": 
					echo (count($routes). " " . $routes[2] . " " . $routes[3]);
				    if (count($routes) >= 4 && $routes[2] != null && $routes[3] != null)
						echo(GetActiveFightersByWeightAndGender($routes[2], $routes[3]));  
					else if (count($routes) >= 3 && $routes[2] != null)
						echo(GetActiveFightersByClubId($routes[2]));      
					else
						echo(GetActiveFighters());        
					break;
				case "DISCIPLINE": 
					echo(GetDisciplineById($routes[2]));        
					break;
				case "DISCIPLINES": 
					echo(GetActiveDisciplines());        
					break;
				case "COUNTRY": 
					echo(GetCountryById($routes[2]));        
					break;
				case "COUNTRIES": 
					echo(GetActiveCountries());        
					break;
				case "CITY": 
					echo(GetCityById($routes[2]));        
					break;
				case "CITIES": 
					echo(GetActiveCities());        
					break;
				case "CLUB": 
					echo(GetClubById($routes[2]));        
					break;
				case "CLUBS": 					
					if (count($routes) >= 3 && $routes[2] != null)
						echo(GetActiveClubsByDisciplineId($routes[2]));
					else
						echo(GetActiveClubs());						
					break;	
				case "WEIGHT": 
					echo(GetWeightById($routes[2]));        
					break;	
				case "WEIGHTS": 
					echo(GetActiveWeightsByDisciplineId($routes[2]));        
					break;
				case "GRADE": 
					echo(GetGradeById($routes[2]));        
					break;	
				case "GRADES": 
					echo(GetActiveGradesByDisciplineId($routes[2]));        
					break;					
				case "ACCOUNT": 
					echo(GetAccountById($routes[2]));        
					break;	
				case "ACCOUNTS": 
					echo(GetActiveAccount($routes[2]));        
					break;	
			}
		}
	}
 
?>