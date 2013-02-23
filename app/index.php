<?php

class bootstrap
{
	//Database Setup
	
	public $db_host	= 'localhost';
	public $db_user	= 'root';
	public $db_pwd	= 'root';
	public $db_name	= 'database_name';
	
	//Error handling
	
	public $sError	= "";
	public $iError	= 0;
	public $iInsert	= 0;
	
	public function __construct()
	{
		//Set Errors
		
		ini_set('display_errors', 1);
		ini_set('error_reporting', E_ALL);
		error_reporting(E_ALL);
		
		//Connect to Database
		
		if(!mysql_connect($this->db_host, $this->db_user, $this->db_pwd))
		{
			$this->sError = "Can't connect to database";
			$this->iError = 1;
		}
		
		if(!mysql_select_db($this->db_name))
		{
			$this->sError = "Can't select database";
			$this->iError = 1;
		}
	}

	public function init() 
	{
		//Check URI Stack

		$uriPath = getenv('REQUEST_URI');
		$uriStack = explode('/', $uriPath);

		$controller_name = "application";
		$action_name = "index";

		if($uriPath != "/") 
		{
			if(count($uriStack) >= 3) 
			{
				$controller_name = $uriStack[1];
				$action_name = $uriStack[2];
			} 
			else if(count($uriStack) == 2) 
			{
				$controller_name = $uriStack[1];
			}
		}

		//Include Controller Class

		include "controllers/" . $controller_name . ".php";

		//Include Layout

		include "views/layout.php";
	}
}

$bootstrap = new bootstrap();
$bootstrap->init();

?>
