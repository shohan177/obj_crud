<?php 


namespace app\Support;
use mysqli;

/**
 * database management
 */
abstract class Database
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
		/*************************************
		 * Media insert funaction
		 ************************************/
		protected function fileUpload($fils ,$location ='',array $filetype=['jpg','png','gif'])
		{
			//file info
			$file_name = $fils['name'];
			$file_tmp = $fils['tmp_name'];
			$file_size = $fils['size'];

			//file extenation 
			$file_array = explode('.', $file_name);
			$file_ext = strtolower(end($file_array));

			//file uniqe name 
			$uniqe_filename = md5(time().rand()).".".$file_ext;

			//media send to media folder
			move_uploaded_file($file_tmp, $location.$uniqe_filename);

			return $uniqe_filename;
		}

		/*************************************
		 * Data insert funaction
		 *************************************/
		protected function insert($table, array $data)
		{
		
			//make table col name frome array
			$array_key = array_keys($data);
			$col_name = implode(',',$array_key);


			//make table value frome array 
			$array_valus = array_values($data);

			foreach ($array_valus as $value) {
				
				$single_col_value[] = "'".$value."'";
			}
			
			$col_value = implode(",",$single_col_value);



			//data sent to database
			$sql = "INSERT INTO $table ($col_name) VALUES ($col_value) ";
			$result = $this -> Connection()  -> query($sql);

			if ($result) {
				return true;
			}

		}



}