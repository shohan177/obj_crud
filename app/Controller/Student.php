<?php 

namespace App\Controller;

use App\Support\Database;

class Student extends Database
{
	/**
	 * inser user information 
	 */
	public function addNewStudent($name, $email, $cell, $photo, $table_name)
	{
		$photo_name = parent::fileUpload($photo,'media/student/img');



		$notification = parent::insert($table_name, [

			'name'      => $name,
			'email'     => $email,
			'cell'      => $cell,
			'photo'     => $photo_name

		]);

		if ($notification) {
			return '<p class="alert alert-success"> Added sucess <button class="close" data-dismiss="alert">&times;</button></p>';
		}
	}

	/**
	 * get all user data
	 */
	public function allStudent()
	{
		$data = parent:: all('students', 'DESC');
		if ($data) {
			return $data;
		}
	}

	/**
	 * delete student 
	 */

	public function delstudent($id)
	{
		$notification = parent::delete('students',$id);
		if ($notification) {
			return "<p class=\"alert alert-danger\"> Delete number <b>$id</b> data sucess  <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
		}
	}

	/**
	 * view single student 
	 */

	public function viewStudent($id)
	{
		$data = parent::find('students',$id);
		return $data -> fetch_assoc();
	
	}

	/**
	 * update student 
	 */
	public function updateStudent($id,$name, $email, $cell, $photo, $photo_status)
	{
		if ( $photo_status == "new") {
			$photo_name = parent::fileUpload($photo,'media/student/img');
		}else{
			$photo_name = $photo;
		}

		$data = parent::update('students',$id, [

			'name'      => $name,
			'email'     => $email,
			'cell'      => $cell,
			'photo'     => $photo_name

		]);

		if ($data) {

			return "<p class=\"alert alert-danger\"> update sucessfull data sucess  <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
		}
	}
}

