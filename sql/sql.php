<?php

class Sql
{
	static $server;
	static $login;
	static $password;
	static $database;

	static function ConnectProd()
	{
		Sql::$server= "honorfrpns4honor.mysql.db";
		Sql::$login = "honorfrpns4honor";
		Sql::$database= "honorfrpns4honor";
		Sql::$password = "4honorDb";
	}
	
	static function Connect()
	{
		Sql::$server= "localhost";
		Sql::$login = "root";
		Sql::$database= "4honor";
		Sql::$password = "";
	}

	static function IsConnected()
	{
		$conn = mysqli_connect(Sql::$server, Sql::$login, Sql::$password, Sql::$database);
		return mysql_select_db(Sql::$database);
	}
	
	static function ExecuteQuery($query)
	{
		$conn = mysqli_connect(Sql::$server, Sql::$login, Sql::$password, Sql::$database);

		$result = $conn->query($query);
		if (!$result)
		{
			return false;
		}

		mysqli_close($conn);
		
		return $result;
	}
	
	static function FetchQuery($query)
	{		
		$array = array();
		
		Sql::Connect();
		
		$result = Sql::ExecuteQuery($query);		
		
		while ($row = mysqli_fetch_assoc($result))
		{
			array_push($array, $row);
		}
		
		return $array;
	}
}
?>
