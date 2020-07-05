<?php 


namespace app\Support;
use mysqli;

/**
 * database management
 */
class Database
{
	
	/**
	 * connection property 
	 */

	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db = "obj";
	private $connection;

	/**
	 * database connection 
	 */
	
	private function Connection()
	{
		return $this -> connection = new mysqli($this -> host, $this -> user, $this -> pass, $this -> db);
	}


}